<?php

namespace App\Models\Contactos;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class Parentesco
 * @package App\Models\Contactos
 * @version November 20, 2020, 3:28 am UTC
 *
 * @property \App\Models\Contactos\Contacto $contactoDestino
 * @property \App\Models\Contactos\Contacto $contactoOrigen
 * @property \App\Models\Contactos\TipoParentesco $tipoParentesco
 * @property integer $contacto_origen
 * @property integer $contacto_destino
 * @property integer $tipo_parentesco_id
 * @property boolean $acudiente
 */
class Parentesco extends Model implements Recordable
{

    public $table = 'parentesco';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;

    public $fillable = [
        'contacto_origen',
        'contacto_destino',
        'tipo_parentesco_id',
        'acudiente'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'contacto_origen' => 'integer',
        'contacto_destino' => 'integer',
        'tipo_parentesco_id' => 'integer',
        'acudiente' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contacto_origen' => 'required|integer',
        'contacto_destino' => 'required|integer',
        'tipo_parentesco_id' => 'required|integer',
        'acudiente' => 'nullable|boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function contactoDestino()
    {
        return $this->belongsTo(\App\Models\Contactos\Contacto::class, 'contacto_destino');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function contactoOrigen()
    {
        return $this->belongsTo(\App\Models\Contactos\Contacto::class, 'contacto_origen');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipoParentesco()
    {
        return $this->belongsTo(\App\Models\Parametros\TipoParentesco::class, 'tipo_parentesco_id')
         ->withDefault(['nombre' => '']);
    }

    /**
     * Se sobreescribe el método con el fin de crear 
     * el registro contrario en el pariente
     */
    public function save(array $options = [])
    {
        parent::save($options);        
        try{
            $contrario = new Parentesco();
            $contrario->contacto_origen=$this->contacto_destino;   
            $contrario->contacto_destino=$this->contacto_origen; 
            $contrario->tipo_parentesco_id=$this->tipoParentesco->tipo_contrario_id;
            $existeContrario = Parentesco::where('contacto_origen','=',$contrario->contacto_origen)
            ->where('contacto_destino','=',$contrario->contacto_destino)
            ->where('tipo_parentesco_id','=',$contrario->tipo_parentesco_id)->first();
            if(empty($existeContrario)){               
                $contrario->save(); 
            }                 
        }catch(\Exception $e){
            \Log::debug('Error al asociar el parentesco contrario'.$e->getMessage());   
        }
    }

    /**
     * Define los join que deben ir en el query del datatable
     */
    public static function joinSegmento($model){
        return $model
            ->leftjoin('parentesco', 'contacto.id', '=', 'parentesco.contacto_destino')
            ->leftjoin('tipo_parentesco as parentescoTipo', 'parentesco.tipo_parentesco_id', '=', 'parentescoTipo.id');
    }

    /**
     * Define los select que deben ir en el query del datatable para exportaciones
     */
    public static function selectSegmento(){
        return [];
    }

    /**
     * Establece la obtención de los valores en los inputs de la vista de segmento
     */
    public static function inputsSegmento(){
        $dt_atributos = [
            'parentescoTipos',
            'parentescoAcudiente',
            'cantidadHijosMinimo',
            'cantidadHijosMaximo',
            'edadMinimaHijos',
            'edadMaximaHijos',
        ];
        $inputs="";
        foreach($dt_atributos as $atributo){
            $inputs.="data.{$atributo}  = $('#{$atributo}').val();";   
        }
        return $inputs;
    }

    /**
     * Filtra el query de acuerdo a los atributos enviados, relacionados con la entidad contacto
     */
    public static function filtroSegmento($valores, $query){
        $dt_atributos_in=[
            'parentescoTipos'=>'parentescoTipo.id',
        ];
        foreach($dt_atributos_in as $atributo => $enTabla){
            if(array_key_exists($atributo, $valores) 
            && is_array($valores[$atributo]) &&
            !empty($valores[$atributo])){
                $query->whereIn($enTabla,$valores[$atributo]);
            }
        }   

        //Otras validaciones específicas
        if(array_key_exists('parentescoAcudiente', $valores) && $valores['parentescoAcudiente']!=''){
            //No se revisa solo con empty pues el valor 0 en activo implica no
            $query->where("parentesco.acudiente", $valores['parentescoAcudiente']);
        }

        //Validación con hijos, el tipo parentesco debe ser dos
        if((array_key_exists('cantidadHijosMinimo', $valores) && is_numeric($valores['cantidadHijosMinimo']))||
            (array_key_exists('cantidadHijosMaximo', $valores) && is_numeric($valores['cantidadHijosMaximo']))){
            $consulta= "contacto.id in (
            SELECT contacto_origen 
            FROM parentesco
            WHERE tipo_parentesco_id=2 
            GROUP BY contacto_origen having count(*)>0";
            if(array_key_exists('cantidadHijosMinimo', $valores) && is_numeric($valores['cantidadHijosMinimo'])){
                $consulta.=" and count(*)>=".$valores['cantidadHijosMinimo']." ";
            }
            if(array_key_exists('cantidadHijosMaximo', $valores) && is_numeric($valores['cantidadHijosMaximo'])){
                $consulta.=" and count(*)<=".$valores['cantidadHijosMaximo']." ";
            }
            $consulta.=")";
            $query->whereRaw($consulta);
        }

        //Validación con edad
        if((array_key_exists('edadMinimaHijos', $valores) && is_numeric($valores['edadMinimaHijos']))||
            (array_key_exists('edadMaximaHijos', $valores) && is_numeric($valores['edadMaximaHijos']))){
            $consulta= "contacto.id in (
                SELECT contacto_origen 
                FROM parentesco
                WHERE tipo_parentesco_id=2 
                and contacto_destino in (select id from contacto where id is not null";
            if(array_key_exists('edadMinimaHijos', $valores) && is_numeric($valores['edadMinimaHijos'])){
                $consulta.=" and fecha_nacimiento is not null and  TIMESTAMPDIFF( YEAR, fecha_nacimiento, now()) >=".$valores['edadMinimaHijos']." ";
            }
            if(array_key_exists('edadMaximaHijos', $valores) && is_numeric($valores['edadMaximaHijos'])){
                $consulta.=" and fecha_nacimiento is not null and  TIMESTAMPDIFF( YEAR, fecha_nacimiento, now()) <=".$valores['edadMaximaHijos']." ";
            }
            $consulta.="))";
            $query->whereRaw($consulta);
        }
    }  
}
