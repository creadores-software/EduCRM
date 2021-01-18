<?php

namespace App\Models\Contactos;

use Eloquent as Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class InformacionRelacional
 * @package App\Models\Contactos
 * @version November 19, 2020, 10:52 pm UTC
 *
 * @property \App\Models\Contactos\ActitudServicio $actitudServicio
 * @property \App\Models\Contactos\Beneficio $beneficio
 * @property \App\Models\Contactos\EstadoDisposicion $estadoDisposicion
 * @property \App\Models\Contactos\EstatusLealtad $estatusLealtad
 * @property \App\Models\Contactos\EstatusUsuario $estatusUsuario
 * @property \App\Models\Contactos\EstiloVida $estiloVida
 * @property \App\Models\Contactos\FrecuenciaUso $frecuenciaUso
 * @property \App\Models\Contactos\Generacion $generacion
 * @property \App\Models\Contactos\NivelFormacion $maximoNivelFormacion
 * @property \App\Models\Contactos\Ocupacion $ocupacionActual
 * @property \App\Models\Contactos\Personalidad $personalidad
 * @property \App\Models\Contactos\Raza $raza
 * @property \App\Models\Contactos\Religion $religion
 * @property \Illuminate\Database\Eloquent\Collection $preferenciasActividadesOcio
 * @property \Illuminate\Database\Eloquent\Collection $preferenciasCamposEducacion
 * @property \Illuminate\Database\Eloquent\Collection $preferenciasFormaciones
 * @property \Illuminate\Database\Eloquent\Collection $preferenciasMediosComunicacion
 * @property integer $maximo_nivel_formacion_id
 * @property integer $ocupacion_actual_id
 * @property integer $estilo_vida_id
 * @property integer $religion_id
 * @property integer $raza_id
 * @property integer $generacion_id
 * @property integer $personalidad_id
 * @property integer $beneficio_id
 * @property integer $frecuencia_uso_id
 * @property integer $estatus_usuario_id
 * @property integer $estatus_lealtad_id
 * @property integer $estado_disposicion_id
 * @property integer $actitud_servicio_id
 * @property boolean $autoriza_comunicacion
 */
class InformacionRelacional extends Model implements Recordable
{

    public $table = 'informacion_relacional';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;
    //Para los eventos de BelongsToMany
    use \Altek\Eventually\Eventually;

    public $fillable = [        
        'maximo_nivel_formacion_id',
        'ocupacion_actual_id',
        'estilo_vida_id',
        'religion_id',
        'raza_id',
        'generacion_id',
        'personalidad_id',
        'beneficio_id',
        'frecuencia_uso_id',
        'estatus_usuario_id',
        'estatus_lealtad_id',
        'estado_disposicion_id',
        'actitud_servicio_id',
        'autoriza_comunicacion',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',       
        'maximo_nivel_formacion_id' => 'integer',
        'ocupacion_actual_id' => 'integer',
        'estilo_vida_id' => 'integer',
        'religion_id' => 'integer',
        'raza_id' => 'integer',
        'generacion_id' => 'integer',
        'personalidad_id' => 'integer',
        'beneficio_id' => 'integer',
        'frecuencia_uso_id' => 'integer',
        'estatus_usuario_id' => 'integer',
        'estatus_lealtad_id' => 'integer',
        'estado_disposicion_id' => 'integer',
        'actitud_servicio_id' => 'integer',
        'autoriza_comunicacion' => 'boolean',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [        
        'maximo_nivel_formacion_id' => 'nullable|integer',
        'ocupacion_actual_id' => 'nullable|integer',
        'estilo_vida_id' => 'nullable|integer',
        'religion_id' => 'nullable|integer',
        'raza_id' => 'nullable|integer',
        'generacion_id' => 'nullable|integer',
        'personalidad_id' => 'nullable|integer',
        'beneficio_id' => 'nullable|integer',
        'frecuencia_uso_id' => 'nullable|integer',
        'estatus_usuario_id' => 'nullable|integer',
        'estatus_lealtad_id' => 'nullable|integer',
        'estado_disposicion_id' => 'nullable|integer',
        'actitud_servicio_id' => 'nullable|integer',
        'autoriza_comunicacion' => 'nullable|boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function actitudServicio()
    {
        return $this->belongsTo(\App\Models\Parametros\ActitudServicio::class, 'actitud_servicio_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function beneficio()
    {
        return $this->belongsTo(\App\Models\Parametros\Beneficio::class, 'beneficio_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estadoDisposicion()
    {
        return $this->belongsTo(\App\Models\Parametros\EstadoDisposicion::class, 'estado_disposicion_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estatusLealtad()
    {
        return $this->belongsTo(\App\Models\Parametros\EstatusLealtad::class, 'estatus_lealtad_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estatusUsuario()
    {
        return $this->belongsTo(\App\Models\Parametros\EstatusUsuario::class, 'estatus_usuario_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estiloVida()
    {
        return $this->belongsTo(\App\Models\Parametros\EstiloVida::class, 'estilo_vida_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function frecuenciaUso()
    {
        return $this->belongsTo(\App\Models\Parametros\FrecuenciaUso::class, 'frecuencia_uso_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function generacion()
    {
        return $this->belongsTo(\App\Models\Parametros\Generacion::class, 'generacion_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function maximoNivelFormacion()
    {
        return $this->belongsTo(\App\Models\Formaciones\NivelFormacion::class, 'maximo_nivel_formacion_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ocupacionActual()
    {
        return $this->belongsTo(\App\Models\Entidades\Ocupacion::class, 'ocupacion_actual_id')
            ->withDefault(['nombre' => '']);
    } 

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function personalidad()
    {
        return $this->belongsTo(\App\Models\Parametros\Personalidad::class, 'personalidad_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function raza()
    {
        return $this->belongsTo(\App\Models\Parametros\Raza::class, 'raza_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function religion()
    {
        return $this->belongsTo(\App\Models\Parametros\Religion::class, 'religion_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contacto()
    {
        return $this->hasOne(\App\Models\Contactos\Contacto::class, 'informacion_relacional_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function preferenciasActividadesOcio()
    {
        return $this->belongsToMany(\App\Models\Parametros\ActividadOcio::class, 'preferencia_actividad_ocio');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function preferenciasCamposEducacion()
    {
        return $this->belongsToMany(\App\Models\Formaciones\CampoEducacion::class, 'preferencia_campo_educacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function preferenciasFormaciones()
    {
        return $this->belongsToMany(\App\Models\Formaciones\Formacion::class, 'preferencia_formacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function preferenciasMediosComunicacion()
    {
        return $this->belongsToMany(\App\Models\Parametros\MedioComunicacion::class, 'preferencia_medio_comunicacion');
    }

    /**
     * Define los join que deben ir en el query del datatable
     */
    public static function joinDataTable($model){
        return $model
        ->leftjoin('informacion_relacional as informacionRelacional', 'contacto.informacion_relacional_id', '=', 'informacionRelacional.id')
        
        ->leftjoin('nivel_formacion as nivelFormacion', 'informacionRelacional.maximo_nivel_formacion_id', '=', 'nivelFormacion.id')
        ->leftjoin('ocupacion', 'informacionRelacional.ocupacion_actual_id', '=', 'ocupacion.id')
        ->leftjoin('estilo_vida as estiloVida', 'informacionRelacional.estilo_vida_id', '=', 'estiloVida.id')
        ->leftjoin('religion', 'informacionRelacional.religion_id', '=', 'religion.id')
        ->leftjoin('raza', 'informacionRelacional.raza_id', '=', 'raza.id')
        ->leftjoin('generacion', 'informacionRelacional.generacion_id', '=', 'generacion.id')
        ->leftjoin('personalidad', 'informacionRelacional.personalidad_id', '=', 'personalidad.id')
        ->leftjoin('beneficio', 'informacionRelacional.beneficio_id', '=', 'beneficio.id')
        ->leftjoin('frecuencia_uso as frecuenciaUso', 'informacionRelacional.frecuencia_uso_id', '=', 'frecuenciaUso.id')
        ->leftjoin('estatus_usuario as estatusUsuario', 'informacionRelacional.estatus_usuario_id', '=', 'estatusUsuario.id')
        ->leftjoin('estatus_lealtad as estatusLealtad', 'informacionRelacional.estatus_lealtad_id', '=', 'estatusLealtad.id')
        ->leftjoin('estado_disposicion as estadoDisposicion', 'informacionRelacional.estado_disposicion_id', '=', 'estadoDisposicion.id')
        ->leftjoin('actitud_servicio as actitudServicio', 'informacionRelacional.actitud_servicio_id', '=', 'actitudServicio.id')

        ->leftjoin('preferencia_actividad_ocio as preferenciaActividadOcio', 'preferenciaActividadOcio.informacion_relacional_id', '=', 'informacionRelacional.id')
        ->leftjoin('preferencia_campo_educacion as preferenciaCampoEducacion', 'preferenciaCampoEducacion.informacion_relacional_id', '=', 'informacionRelacional.id')
        ->leftjoin('preferencia_formacion as preferenciaFormacion', 'preferenciaFormacion.informacion_relacional_id', '=', 'informacionRelacional.id')
        ->leftjoin('preferencia_medio_comunicacion as preferenciaMedioComunicacion', 'preferenciaMedioComunicacion.informacion_relacional_id', '=', 'informacionRelacional.id');
    }

    /**
     * Define los select que deben ir en el query del datatable
     */
    public static function selectDataTable(){
        return 
        ['nivelFormacion.nombre as nombre_nivel_formacion','ocupacion.nombre as nombre_ocupacion','estiloVida.nombre as nombre_estilo_vida',
        'religion.nombre as nombre_religion','raza.nombre as nombre_raza','generacion.nombre as nombre_generacion',
        'personalidad.nombre as nombre_personalidad','beneficio.nombre as nombre_beneficio','frecuenciaUso.nombre as nombre_frecuencia_uso',
        'estatusUsuario.nombre as nombre_estatus_usuario','estatusLealtad.nombre as nombre_estatus_lealtad','estadoDisposicion.nombre as nombre_estado_disposicion',
        'actitudServicio.nombre as nombre_actitud_servicio','informacionRelacional.autoriza_comunicacion'];
    }

    /**
     * Establece la obtención de los valores en los inputs de la vista de segmento
     */
    public static function inputsDataTable(){  
        $dt_atributos = [
            'nivelesFormacion',
            'ocupaciones',
            'estilosVida',
            'religiones',
            'razas',
            'generaciones',
            'personalidades',
            'beneficios',
            'frecuenciasUso',
            'estatusUsuario',
            'estatusLealtad',
            'estadosDisposicion',
            'actitudesServicio',
            'autoriza_comunicacion',
            'preferenciasMediosComunicacion',
            'preferenciasFormaciones',
            'preferenciasCamposEducacion',
            'preferenciasActividadesOcio'
        ];
        $inputs="";
        foreach($dt_atributos as $atributo){
            $inputs.="data.{$atributo}  = $('#{$atributo}').val();";   
        }
        return $inputs;     
    }

    /**
     * Filtra el query de acuerdo a los atributos enviados, relacionados con la entidad informacion relacional
     */
    public static function filtroDataTable($valores, $query){ 
        $dt_atributos_in=[
            'nivelesFormacion'=>'informacionRelacional.maximo_nivel_formacion_id',
            'ocupaciones'=>'informacionRelacional.ocupacion_actual_id',
            'estilosVida'=>'informacionRelacional.estilo_vida_id',
            'religiones'=>'informacionRelacional.religion_id',
            'razas'=>'informacionRelacional.raza_id',
            'generaciones'=>'informacionRelacional.generacion_id',
            'personalidades'=>'informacionRelacional.personalidad_id',
            'beneficios'=>'informacionRelacional.beneficio_id',
            'frecuenciasUso'=>'informacionRelacional.frecuencia_uso_id',
            'estatusUsuario'=>'informacionRelacional.estatus_usuario_id',
            'estatusLealtad'=>'informacionRelacional.estatus_lealtad_id',
            'estadosDisposicion'=>'informacionRelacional.estado_disposicion_id',
            'actitudesServicio'=>'informacionRelacional.actitud_servicio_id',
            'autoriza_comunicacion'=>'informacionRelacional.autoriza_comunicacion',
            'preferenciasMediosComunicacion'=>'preferenciaMedioComunicacion.medio_comunicacion_id',
            'preferenciasFormaciones'=>'preferenciaFormacion.formacion_id',
            'preferenciasCamposEducacion'=>'preferenciaCampoEducacion.campo_educacion_id',
            'preferenciasActividadesOcio'=>'preferenciaActividadOcio.actividad_ocio_id',
        ];
        foreach($dt_atributos_in as $atributo => $enTabla){
            if(array_key_exists($atributo, $valores) && !empty($valores[$atributo])){
                $query->whereIn($enTabla,$valores[$atributo]);
            }
        }      
    }   
}
