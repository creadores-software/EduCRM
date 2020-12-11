<?php

namespace App\Models\Contactos;

use Eloquent as Model;
use OwenIt\Auditing\Contracts\Auditable;

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
class InformacionRelacional extends Model implements Auditable
{

    public $table = 'informacion_relacional';
    
    public $timestamps = false;

    use \OwenIt\Auditing\Auditable;

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function preferenciasActividadesOcio()
    {
        return $this->hasMany(\App\Models\Contactos\PreferenciaActividadOcio::class, 'informacion_relacional_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function preferenciasCamposEducacion()
    {
        return $this->hasMany(\App\Models\Contactos\PreferenciaCampoEducacion::class, 'informacion_relacional_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function preferenciasFormaciones()
    {
        return $this->hasMany(\App\Models\Contactos\PreferenciaFormacion::class, 'informacion_relacional_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function preferenciasMediosComunicacion()
    {
        return $this->hasMany(\App\Models\Contactos\PreferenciaMedioComunicacion::class, 'informacion_relacional_id');
    }
}
