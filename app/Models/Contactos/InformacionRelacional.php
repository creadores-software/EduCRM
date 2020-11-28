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
 * @property \App\Models\Contactos\Contacto $contacto
 * @property \App\Models\Contactos\Contacto $referidoPor
 * @property \App\Models\Contactos\EstadoDisposicion $estadoDisposicion
 * @property \App\Models\Contactos\EstatusLealtad $estatusLealtad
 * @property \App\Models\Contactos\EstatusUsuario $estatusUsuario
 * @property \App\Models\Contactos\EstiloVida $estiloVida
 * @property \App\Models\Contactos\FrecuenciaUso $frecuenciaUso
 * @property \App\Models\Contactos\Generacion $generacion
 * @property \App\Models\Contactos\NivelFormacion $maximoNivelFormacion
 * @property \App\Models\Contactos\Ocupacion $ocupacionActual
 * @property \App\Models\Contactos\Origen $origen
 * @property \App\Models\Contactos\Personalidad $personalidad
 * @property \App\Models\Contactos\Raza $raza
 * @property \App\Models\Contactos\Religion $religion
 * @property \Illuminate\Database\Eloquent\Collection $preferenciaActividadOcios
 * @property \Illuminate\Database\Eloquent\Collection $preferenciaCampoEducacions
 * @property \Illuminate\Database\Eloquent\Collection $preferenciaFormacions
 * @property \Illuminate\Database\Eloquent\Collection $preferenciaMedioComunicacions
 * @property integer $contacto_id
 * @property integer $origen_id
 * @property integer $referido_por_id
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
 * @property string $actualizacion_autoriza_comunicacion
 */
class InformacionRelacional extends Model implements Auditable
{

    public $table = 'informacion_relacional';
    
    public $timestamps = false;

    use \OwenIt\Auditing\Auditable;

    public $fillable = [
        'contacto_id',
        'origen_id',
        'referido_por_id',
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
        'actualizacion_autoriza_comunicacion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'contacto_id' => 'integer',
        'origen_id' => 'integer',
        'referido_por_id' => 'integer',
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
        'actualizacion_autoriza_comunicacion' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contacto_id' => 'required|integer',
        'origen_id' => 'required|integer',
        'referido_por_id' => 'nullable|integer',
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
        'actualizacion_autoriza_comunicacion' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function actitudServicio()
    {
        return $this->belongsTo(\App\Models\Contactos\ActitudServicio::class, 'actitud_servicio_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function beneficio()
    {
        return $this->belongsTo(\App\Models\Contactos\Beneficio::class, 'beneficio_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function contacto()
    {
        return $this->belongsTo(\App\Models\Contactos\Contacto::class, 'contacto_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function referidoPor()
    {
        return $this->belongsTo(\App\Models\Contactos\Contacto::class, 'referido_por_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estadoDisposicion()
    {
        return $this->belongsTo(\App\Models\Contactos\EstadoDisposicion::class, 'estado_disposicion_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estatusLealtad()
    {
        return $this->belongsTo(\App\Models\Contactos\EstatusLealtad::class, 'estatus_lealtad_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estatusUsuario()
    {
        return $this->belongsTo(\App\Models\Contactos\EstatusUsuario::class, 'estatus_usuario_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estiloVida()
    {
        return $this->belongsTo(\App\Models\Contactos\EstiloVida::class, 'estilo_vida_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function frecuenciaUso()
    {
        return $this->belongsTo(\App\Models\Contactos\FrecuenciaUso::class, 'frecuencia_uso_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function generacion()
    {
        return $this->belongsTo(\App\Models\Contactos\Generacion::class, 'generacion_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function maximoNivelFormacion()
    {
        return $this->belongsTo(\App\Models\Contactos\NivelFormacion::class, 'maximo_nivel_formacion_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ocupacionActual()
    {
        return $this->belongsTo(\App\Models\Contactos\Ocupacion::class, 'ocupacion_actual_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function origen()
    {
        return $this->belongsTo(\App\Models\Contactos\Origen::class, 'origen_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function personalidad()
    {
        return $this->belongsTo(\App\Models\Contactos\Personalidad::class, 'personalidad_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function raza()
    {
        return $this->belongsTo(\App\Models\Contactos\Raza::class, 'raza_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function religion()
    {
        return $this->belongsTo(\App\Models\Contactos\Religion::class, 'religion_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function preferenciaActividadOcios()
    {
        return $this->hasMany(\App\Models\Contactos\PreferenciaActividadOcio::class, 'informacion_relacional_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function preferenciaCampoEducacions()
    {
        return $this->hasMany(\App\Models\Contactos\PreferenciaCampoEducacion::class, 'informacion_relacional_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function preferenciaFormacions()
    {
        return $this->hasMany(\App\Models\Contactos\PreferenciaFormacion::class, 'informacion_relacional_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function preferenciaMedioComunicacions()
    {
        return $this->hasMany(\App\Models\Contactos\PreferenciaMedioComunicacion::class, 'informacion_relacional_id');
    }
}
