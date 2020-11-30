<?php

namespace App\Models\Formaciones;

use Eloquent as Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Formacion
 * @package App\Models\Formaciones
 * @version November 19, 2020, 10:52 pm UTC
 *
 * @property \App\Models\Formaciones\Entidad $entidad
 * @property \App\Models\Formaciones\CampoEducacion $areaConocimiento
 * @property \App\Models\Formaciones\NivelFormacion $nivelFormacion
 * @property \Illuminate\Database\Eloquent\Collection $informacionAcademicas
 * @property \Illuminate\Database\Eloquent\Collection $preferenciaFormacions
 * @property string $nombre
 * @property integer $entidad_id
 * @property integer $nivel_formacion_id
 * @property integer $campo_educacion_id
 * @property boolean $activo
 */
class Formacion extends Model implements Auditable
{

    public $table = 'formacion';
    
    public $timestamps = false;

    use \OwenIt\Auditing\Auditable;

    public $fillable = [
        'nombre',
        'entidad_id',
        'nivel_formacion_id',
        'campo_educacion_id',
        'activo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'entidad_id' => 'integer',
        'nivel_formacion_id' => 'integer',
        'campo_educacion_id' => 'integer',
        'activo' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:150',
        'entidad_id' => 'required|integer',
        'nivel_formacion_id' => 'required|integer',
        'campo_educacion_id' => 'nullable|integer',
        'activo' => 'nullable|boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function entidad()
    {
        return $this->belongsTo(\App\Models\Formaciones\Entidad::class, 'entidad_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function areaConocimiento()
    {
        return $this->belongsTo(\App\Models\Formaciones\CampoEducacion::class, 'campo_educacion_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function nivelFormacion()
    {
        return $this->belongsTo(\App\Models\Formaciones\NivelFormacion::class, 'nivel_formacion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function informacionAcademicas()
    {
        return $this->hasMany(\App\Models\Formaciones\InformacionAcademica::class, 'formacion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function preferenciaFormacions()
    {
        return $this->hasMany(\App\Models\Formaciones\PreferenciaFormacion::class, 'formacion_id');
    }
}
