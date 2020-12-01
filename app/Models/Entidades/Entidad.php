<?php

namespace App\Models\Entidades;

use Eloquent as Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Entidad
 * @package App\Models\Entidades
 * @version November 19, 2020, 10:52 pm UTC
 *
 * @property \App\Models\Entidades\Lugar $lugar
 * @property \App\Models\Entidades\ActividadEconomica $actividadEconomica
 * @property \App\Models\Entidades\Sector $sector
 * @property \Illuminate\Database\Eloquent\Collection $formacions
 * @property \Illuminate\Database\Eloquent\Collection $informacionEscolars
 * @property \Illuminate\Database\Eloquent\Collection $informacionLaborals
 * @property string $nombre
 * @property integer $lugar_id
 * @property string $direccion
 * @property string $telefono
 * @property integer $sector_id
 * @property integer $actividad_economica_id
 * @property boolean $mi_universidad
 */
class Entidad extends Model implements Auditable
{

    public $table = 'entidad';
    
    public $timestamps = false;

    use \OwenIt\Auditing\Auditable;

    public $fillable = [
        'nombre',
        'lugar_id',
        'direccion',
        'telefono',
        'sector_id',
        'actividad_economica_id',
        'mi_universidad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'lugar_id' => 'integer',
        'direccion' => 'string',
        'telefono' => 'string',
        'sector_id' => 'integer',
        'actividad_economica_id' => 'integer',
        'mi_universidad' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:200',
        'lugar_id' => 'required|integer',
        'direccion' => 'nullable|string|max:200',
        'telefono' => 'nullable|string|max:15',
        'sector_id' => 'nullable|integer',
        'actividad_economica_id' => 'nullable|integer',
        'mi_universidad' => 'nullable|boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function lugar()
    {
        return $this->belongsTo(\App\Models\Parametros\Lugar::class, 'lugar_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function actividadEconomica()
    {
        return $this->belongsTo(\App\Models\Entidades\ActividadEconomica::class, 'actividad_economica_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sector()
    {
        return $this->belongsTo(\App\Models\Entidades\Sector::class, 'sector_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function formacions()
    {
        return $this->hasMany(\App\Models\Entidades\Formacion::class, 'entidad_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function informacionEscolars()
    {
        return $this->hasMany(\App\Models\Entidades\InformacionEscolar::class, 'entidad_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function informacionLaborals()
    {
        return $this->hasMany(\App\Models\Entidades\InformacionLaboral::class, 'entidad_id');
    }
}
