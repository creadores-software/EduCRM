<?php

namespace App\Models\Contactos;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class InformacionEscolar
 * @package App\Models\Contactos
 * @version November 19, 2020, 10:52 pm UTC
 *
 * @property \App\Models\Contactos\Contacto $contacto
 * @property \App\Models\Contactos\Entidad $entidad
 * @property \App\Models\Contactos\NivelFormacion $nivelFormacion
 * @property integer $contacto_id
 * @property integer $entidad_id
 * @property integer $nivel_formacion_id
 * @property boolean $finalizado
 * @property string $fecha_inicio
 * @property string $fecha_grado
 * @property integer $grado
 */
class InformacionEscolar extends Model implements Recordable
{

    public $table = 'informacion_escolar';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;

    public $fillable = [
        'contacto_id',
        'entidad_id',
        'nivel_formacion_id',
        'finalizado',
        'fecha_inicio',
        'fecha_grado',
        'grado'
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
        'nivel_formacion_id' => 'integer',
        'finalizado' => 'boolean',
        'fecha_inicio' => 'date',
        'fecha_grado' => 'date',
        'grado' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contacto_id' => 'required|integer',
        'entidad_id' => 'required|integer',
        'nivel_formacion_id' => 'required|integer',
        'finalizado' => 'nullable|boolean',
        'fecha_inicio' => 'nullable|before_or_equal:today',
        'fecha_grado' => 'nullable',
        'grado' => 'nullable|integer'
    ];

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function nivelFormacion()
    {
        return $this->belongsTo(\App\Models\Formaciones\NivelFormacion::class, 'nivel_formacion_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * Define los join que deben ir en el query del datatable
     */
    public static function joinDataTable($model){
        return $model
            ->leftjoin('informacion_escolar as informacionEscolar', 'contacto.id', '=', 'informacionEscolar.contacto_id')

            ->leftjoin('entidad as colegioEntidad', 'informacionEscolar.entidad_id', '=', 'colegioEntidad.id')
            ->leftjoin('lugar as colegioUbicacionEntidad', 'colegioEntidad.lugar_id', '=', 'colegioUbicacionEntidad.id')
            ->leftjoin('nivel_formacion as colegioNivelFormacion', 'informacionEscolar.nivel_formacion_id', '=', 'colegioNivelFormacion.id');
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
           'colegioEntidades',
           'colegioUbicacionesEntidad',
           'colegioNivelesFormacion',
           'colegioGradoMinimo',
           'colegioGradoMaximo',
           'colegioFinalizado',
           'colegioFechaInicialInicio',
           'colegioFechaFinalInicio',
           'colegioFechaInicialGrado',
           'colegioFechaFinalGrado',
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
           'colegioEntidades'=>'colegioEntidad.id',
           'colegioUbicacionesEntidad'=>'colegioUbicacionEntidad.id',
           'colegioNivelesFormacion'=>'colegioNivelFormacion.id',
        ];
        foreach($dt_atributos_in as $atributo => $enTabla){
            if(array_key_exists($atributo, $valores) 
            && is_array($valores[$atributo]) &&
            !empty($valores[$atributo])){
                $query->whereIn($enTabla,$valores[$atributo]);
            }
        }

        $dt_atributos_menor_que=[
            'colegioGradoMinimo'=>'informacionEscolar.grado',
            'colegioFechaInicialInicio'=>'informacionEscolar.fecha_inicio',
            'colegioFechaInicialGrado'=>'informacionEscolar.fecha_grado',
        ];
        foreach($dt_atributos_menor_que as $atributo => $enTabla){
            if(array_key_exists($atributo, $valores) && !empty($valores[$atributo])){
                $query->whereRaw("{$enTabla} is not null and  {$enTabla} >= ?",[$valores[$atributo]]);
            }
        }

        $dt_atributos_mayor_que=[
            'colegioGradoMaximo'=>'informacionEscolar.grado',
            'colegioFechaFinalInicio'=>'informacionEscolar.fecha_inicio',
            'colegioFechaFinalGrado'=>'informacionEscolar.fecha_grado',
        ];
        foreach($dt_atributos_mayor_que as $atributo => $enTabla){
            if(array_key_exists($atributo, $valores) && !empty($valores[$atributo])){
                $query->whereRaw("{$enTabla} is not null and  {$enTabla} <= ?",[$valores[$atributo]]);
            }
        }

        //Otras validaciones específicas
        if(array_key_exists('colegioFinalizado', $valores) && $valores['colegioFinalizado']!=''){
            //No se revisa solo con empty pues el valor 0 en activo implica no
            $query->where("colegioFinalizado", $valores['colegioFinalizado']);
        }
    } 
}
