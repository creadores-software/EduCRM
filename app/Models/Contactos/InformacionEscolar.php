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
 * @property string $fecha_icfes
 * @property integer $puntaje_icfes
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
        'fecha_icfes',
        'puntaje_icfes',
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
        'fecha_inicio' => 'date:Y-m-d',
        'fecha_grado' => 'date:Y-m-d',
        'fecha_icfes' => 'date:Y-m-d',
        'puntaje_icfes' => 'integer',
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
        'fecha_icfes' => 'nullable',
        'puntaje_icfes' => 'nullable|integer',
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
    public static function joinSegmento($model){
        return $model
            ->leftjoin('informacion_escolar as informacionEscolar', 'contacto.id', '=', 'informacionEscolar.contacto_id')

            ->leftjoin('entidad as colegioEntidad', 'informacionEscolar.entidad_id', '=', 'colegioEntidad.id')
            ->leftjoin('lugar as colegioUbicacionEntidad', 'colegioEntidad.lugar_id', '=', 'colegioUbicacionEntidad.id')
            ->leftjoin('nivel_formacion as colegioNivelFormacion', 'informacionEscolar.nivel_formacion_id', '=', 'colegioNivelFormacion.id');
    }

    /**
     * Define los select que deben ir en el query del datatable para exportaciones
     */
    public static function selectSegmento(){
        return [];
    }

    /**
     * Establece la obtenci??n de los valores en los inputs de la vista de segmento
     */
    public static function inputsSegmento(){
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
           'colegioFechaInicialIcfes',
           'colegioFechaFinalIcfes',
           'colegioIcfesMinimo',
           'colegioIcfesMaximo',
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
            'colegioFechaInicialIcfes'=>'informacionEscolar.fecha_icfes',
            'colegioIcfesMinimo'=>'informacionEscolar.puntaje_icfes',
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
            'colegioFechaFinalIcfes'=>'informacionEscolar.fecha_icfes',
            'colegioIcfesMaximo'=>'informacionEscolar.puntaje_icfes',
        ];
        foreach($dt_atributos_mayor_que as $atributo => $enTabla){
            if(array_key_exists($atributo, $valores) && !empty($valores[$atributo])){
                $query->whereRaw("{$enTabla} is not null and  {$enTabla} <= ?",[$valores[$atributo]]);
            }
        }

        //Otras validaciones espec??ficas
        if(array_key_exists('colegioFinalizado', $valores) && $valores['colegioFinalizado']!=''){
            //No se revisa solo con empty pues el valor 0 en activo implica no
            $query->where("informacionEscolar.finalizado", $valores['colegioFinalizado']);
        }
    } 
}
