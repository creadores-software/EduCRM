<?php

namespace App\Models\Contactos;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;
use Illuminate\Support\Facades\DB;

/**
 * Class InformacionLaboral
 * @package App\Models\Contactos
 * @version November 19, 2020, 10:52 pm UTC
 *
 * @property \App\Models\Contactos\Ocupacion $ocupacion
 * @property \App\Models\Contactos\Contacto $contacto
 * @property \App\Models\Contactos\Entidad $entidad
 * @property integer $contacto_id
 * @property integer $entidad_id
 * @property integer $ocupacion_id
 * @property string $area
 * @property string $funciones
 * @property string $telefono
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property boolean $vinculado_actualmente
 */
class InformacionLaboral extends Model implements Recordable
{

    public $table = 'informacion_laboral';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;

    public $fillable = [
        'contacto_id',
        'entidad_id',
        'ocupacion_id',
        'area',
        'funciones',
        'telefono',
        'fecha_inicio',
        'fecha_fin',
        'vinculado_actualmente'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'contacto_id' => 'integer',
        'entidad_id' => 'integer',
        'ocupacion_id' => 'integer',
        'area' => 'string',
        'funciones' => 'string',
        'telefono' => 'string',
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'vinculado_actualmente' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contacto_id' => 'required|integer',
        'entidad_id' => 'required|integer',
        'ocupacion_id' => 'required|integer',
        'area' => 'nullable|string|max:45',
        'funciones' => 'nullable|string|max:255',
        'telefono' => 'nullable|string|max:15',
        'fecha_inicio' => 'required|before_or_equal:today',
        'fecha_fin' => 'nullable',
        'vinculado_actualmente' => 'nullable|boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ocupacion()
    {
        return $this->belongsTo(\App\Models\Entidades\Ocupacion::class, 'ocupacion_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function contacto()
    {
        return $this->belongsTo(\App\Models\Contactos\Contacto::class, 'contacto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function entidad()
    {
        return $this->belongsTo(\App\Models\Entidades\Entidad::class, 'entidad_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * Define los join que deben ir en el query del datatable
     */
    public static function joinDataTable($model){
        return $model
            ->leftjoin('informacion_laboral as informacionLaboral', 'contacto.id', '=', 'informacionLaboral.contacto_id')

            ->leftjoin('entidad as laboralEntidad', 'informacionLaboral.entidad_id', '=', 'laboralEntidad.id')
            ->leftjoin('lugar as laboralUbicacionEntidad', 'laboralEntidad.lugar_id', '=', 'laboralUbicacionEntidad.id')
            ->leftjoin('actividad_economica as laboralActividadEconomica', 'laboralEntidad.actividad_economica_id', '=', 'laboralActividadEconomica.id')
            ->leftjoin('categoria_actividad_economica as laboralCategoriaActividadEconomica', 'laboralActividadEconomica.categoria_actividad_economica_id', '=', 'laboralCategoriaActividadEconomica.id')
            ->leftjoin('ocupacion as laboralOcupacion', 'informacionLaboral.ocupacion_id', '=', 'laboralOcupacion.id')
            ->leftjoin('tipo_ocupacion as tipoOcupacion', 'laboralOcupacion.tipo_ocupacion_id', '=', 'tipoOcupacion.id');
    }

    /**
     * Define los select que deben ir en el query del datatable para exportaciones
     */
    public static function selectDataTable(){
        return [];
    }

    /**
     * Establece la obtención de los valores en los inputs de la vista de segmento
     */
    public static function inputsDataTable(){
        $dt_atributos = [
            'laboralEntidades',
            'laboralUbicacionesEntidad',
            'laboralTiposOcupacion',
            'laboralOcupaciones',
            'laboralCategoriasActividadEconomica',
            'laboralActividadesEconomicas',
            'laboralVinculado',
            'laboralArea',
            'laboralTelefono',
            'laboralFunciones',
            'laboralFechaInicialInicio',
            'laboralFechaFinalInicio',
            'laboralFechaInicialFin',
            'laboralFechaFinalFin'
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
    public static function filtroDataTable($valores, $query){
        $dt_atributos_in=[
            'laboralEntidades'=>'laboralEntidad.id',
            'laboralUbicacionesEntidad'=>'laboralUbicacionEntidad.id',
            'laboralTiposOcupacion'=>'laboralTipoOcupacion.id',
            'laboralOcupaciones'=>'laboralOcupacion.id',
            'laboralCategoriasActividadEconomica'=>'laboralCategoriaActividadEconomica.id',
            'laboralActividadesEconomicas'=>'laboralActividadEconomica.id',
        ];
        foreach($dt_atributos_in as $atributo => $enTabla){
            if(array_key_exists($atributo, $valores) 
            && is_array($valores[$atributo]) &&
            !empty($valores[$atributo])){
                $query->whereIn($enTabla,$valores[$atributo]);
            }
        }

        $dt_atributos_like=[
            'laboralArea'=>'informacionLaboral.area',
            'laboralTelefono'=>'informacionLaboral.telefono',
            'laboralFunciones'=>'informacionLaboral.funciones',            
        ];
        foreach($dt_atributos_like as $atributo => $enTabla){
            if(array_key_exists($atributo, $valores) && !empty($valores[$atributo])){
                $texto='%'.strtoupper($valores[$atributo]).'%';
                $query->where(DB::raw("upper({$enTabla})"), 'LIKE', $texto);                        
            }
        }

        $dt_atributos_menor_que=[
            'laboralFechaInicialInicio'=>'informacionLaboral.fecha_inicio',
            'laboralFechaInicialFin'=>'informacionLaboral.fecha_fin',
        ];
        foreach($dt_atributos_menor_que as $atributo => $enTabla){
            if(array_key_exists($atributo, $valores) && !empty($valores[$atributo])){
                $query->whereRaw("{$enTabla} is not null and  {$enTabla} >= ?",[$valores[$atributo]]);
            }
        }

        $dt_atributos_mayor_que=[
            'laboralFechaFinalInicio'=>'informacionLaboral.fecha_inicio',
            'laboralFechaFinalFin'=>'informacionLaboral.fecha_fin',
        ];
        foreach($dt_atributos_mayor_que as $atributo => $enTabla){
            if(array_key_exists($atributo, $valores) && !empty($valores[$atributo])){
                $query->whereRaw("{$enTabla} is not null and  {$enTabla} <= ?",[$valores[$atributo]]);
            }
        }

        //Otras validaciones específicas
        if(array_key_exists('laboralVinculado', $valores) && $valores['laboralVinculado']!=''){
            //No se revisa solo con empty pues el valor 0 en activo implica no
            $query->where("informacionLaboral.vinculado_actualmente", $valores['laboralVinculado']);
        }
    }  
}
