<?php

namespace App\Models\Contactos;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class InformacionUniversitaria
 * @package App\Models\Contactos
 * @version April 5, 2021, 10:54 pm -05
 *
 * @property \App\Models\Contactos\Contacto $contacto
 * @property \App\Models\Contactos\Entidad $entidad
 * @property \App\Models\Contactos\Formacion $formacion
 * @property \App\Models\Contactos\PeriodoAcademico $periodoAcademicoFinal
 * @property \App\Models\Contactos\PeriodoAcademico $periodoAcademicoInicial
 * @property \App\Models\Contactos\TipoAcceso $tipoAcceso
 * @property integer $contacto_id
 * @property integer $entidad_id
 * @property integer $formacion_id
 * @property integer $tipo_acceso_id
 * @property string $fecha_inicio
 * @property string $fecha_grado
 * @property boolean $finalizado
 * @property number $promedio
 * @property integer $periodo_alcanzado
 */
class InformacionUniversitaria extends Model implements Recordable
{

    public $table = 'informacion_universitaria';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




    public $fillable = [
        'contacto_id',
        'entidad_id',
        'formacion_id',
        'tipo_acceso_id',
        'fecha_inicio',
        'fecha_grado',
        'periodo_academico_inicial',
        'periodo_academico_final',
        'finalizado',
        'promedio',
        'periodo_alcanzado'
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
        'formacion_id' => 'integer',
        'tipo_acceso_id' => 'integer',
        'fecha_inicio' => 'date',
        'fecha_grado' => 'date',
        'periodo_academico_inicial' => 'integer',
        'periodo_academico_final' => 'integer',
        'finalizado' => 'boolean',
        'promedio' => 'float',
        'periodo_alcanzado' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contacto_id' => 'required|integer',
        'entidad_id' => 'required|integer',
        'formacion_id' => 'required|integer',
        'tipo_acceso_id' => 'nullable|integer',
        'fecha_inicio' => 'nullable|before_or_equal:today',
        'fecha_grado' => 'nullable',
        'periodo_academico_inicial' => 'nullable|integer',
        'periodo_academico_final' => 'nullable|integer',
        'finalizado' => 'nullable|boolean',
        'promedio' => 'nullable|numeric',
        'periodo_alcanzado' => 'nullable|integer'
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
    public function formacion()
    {
        return $this->belongsTo(\App\Models\Formaciones\Formacion::class, 'formacion_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function periodoAcademicoFinal()
    {
        return $this->belongsTo(\App\Models\Formaciones\PeriodoAcademico::class, 'periodo_academico_final')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function periodoAcademicoInicial()
    {
        return $this->belongsTo(\App\Models\Formaciones\PeriodoAcademico::class, 'periodo_academico_inicial')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipoAcceso()
    {
        return $this->belongsTo(\App\Models\Formaciones\TipoAcceso::class, 'tipo_acceso_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * Define los join que deben ir en el query del datatable
     */
    public static function joinSegmento($model){
        return $model
            ->leftjoin('informacion_universitaria as informacionUniversitaria', 'contacto.id', '=', 'informacionUniversitaria.contacto_id')

            ->leftjoin('entidad as universidadEntidad', 'informacionUniversitaria.entidad_id', '=', 'universidadEntidad.id')
            ->leftjoin('lugar as universidadUbicacionEntidad', 'universidadEntidad.lugar_id', '=', 'universidadUbicacionEntidad.id')
            ->leftjoin('formacion as universidadFormacion', 'informacionUniversitaria.formacion_id', '=', 'universidadFormacion.id')
            ->leftjoin('campo_educacion as universidadCampoEducacion', 'universidadFormacion.campo_educacion_id', '=', 'universidadCampoEducacion.id')
            ->leftjoin('categoria_campo_educacion as universidadCategoriaCampoEducacion', 'universidadCampoEducacion.categoria_campo_educacion_id', '=', 'universidadCategoriaCampoEducacion.id')
            ->leftjoin('tipo_acceso as tipoAccceso', 'informacionUniversitaria.tipo_acceso_id', '=', 'tipoAccceso.id')
            ->leftjoin('periodo_academico as universidadPeriodoAcademicoInicial', 'informacionUniversitaria.periodo_academico_inicial', '=', 'universidadPeriodoAcademicoInicial.id')
            ->leftjoin('periodo_academico as universidadPeriodoAcademicoFinal', 'informacionUniversitaria.periodo_academico_final', '=', 'universidadPeriodoAcademicoFinal.id');
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
           'universidadEntidades',
           'universidadUbicacionesEntidad',
           'universidadFormaciones',
           'universidadCategoriasCampoEducacion',
           'universidadCamposEducacion',
           'universidadTiposAcceso',
           'universidadPromedioMinimo',
           'universidadPromedioMaximo',
           'universidadPeriodoAlcanzadoMinimo',
           'universidadPeriodoAlcanzadoMaximo',
           'universidadFinalizado',
           'universidadFechaInicialInicio',
           'universidadFechaFinalInicio',
           'universidadFechaInicialGrado',
           'universidadFechaFinalGrado',
           'universidadPeriodosAcademicosIniciales',
           'universidadPeriodosAcademicosFinales',
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
           'universidadEntidades'=>'universidadEntidad.id',
           'universidadUbicacionesEntidad'=>'universidadUbicacionEntidad.id',
           'universidadFormaciones'=>'universidadFormacion.id',
           'universidadCategoriasCampoEducacion'=>'universidadCategoriaCampoEducacion.id',
           'universidadCamposEducacion'=>'universidadCampoEducacion.id',
           'universidadTiposAcceso'=>'universidadTipoAcceso.id',
           'universidadPeriodosAcademicosIniciales'=>'universidadPeriodoAcademicoInicial.id',
           'universidadPeriodosAcademicosFinales'=>'universidadPeriodoAcademicoFinal.id'
        ];
        foreach($dt_atributos_in as $atributo => $enTabla){
            if(array_key_exists($atributo, $valores) 
            && is_array($valores[$atributo]) &&
            !empty($valores[$atributo])){
                $query->whereIn($enTabla,$valores[$atributo]);
            }
        }

        $dt_atributos_menor_que=[
            'universidadPromedioMinimo'=>'informacionUniversitaria.promedio',
            'universidadPeriodoAlcanzadoMinimo'=>'informacionUniversitaria.periodo_alcanzado',
            'universidadFechaInicialInicio'=>'informacionUniversitaria.fecha_inicio',
            'universidadFechaInicialGrado'=>'informacionUniversitaria.fecha_grado',
        ];
        foreach($dt_atributos_menor_que as $atributo => $enTabla){
            if(array_key_exists($atributo, $valores) && !empty($valores[$atributo])){
                $query->whereRaw("{$enTabla} is not null and  {$enTabla} >= ?",[$valores[$atributo]]);
            }
        }

        $dt_atributos_mayor_que=[
            'universidadPromedioMaximo'=>'informacionUniversitaria.promedio',
            'universidadPeriodoAlcanzadoMaximo'=>'informacionUniversitaria.periodo_alcanzado',
            'universidadFechaFinalInicio'=>'informacionUniversitaria.fecha_inicio',
            'universidadFechaFinalGrado'=>'informacionUniversitaria.fecha_grado',
        ];
        foreach($dt_atributos_mayor_que as $atributo => $enTabla){
            if(array_key_exists($atributo, $valores) && !empty($valores[$atributo])){
                $query->whereRaw("{$enTabla} is not null and  {$enTabla} <= ?",[$valores[$atributo]]);
            }
        }

        //Otras validaciones específicas
        if(array_key_exists('universidadFinalizado', $valores) && $valores['universidadFinalizado']!=''){
            //No se revisa solo con empty pues el valor 0 en activo implica no
            $query->where("informacionUniversitaria.finalizado", $valores['universidadFinalizado']);
        }
    }  
}
