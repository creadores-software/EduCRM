<?php

namespace App\Models\Entidades;

use Eloquent as Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class Entidad
 * @package App\Models\Entidades
 * @version April 3, 2021, 9:36 pm -05
 *
 * @property \App\Models\Entidades\Lugar $lugar
 * @property \App\Models\Entidades\ActividadEconomica $actividadEconomica
 * @property \App\Models\Entidades\Sector $sector
 * @property \Illuminate\Database\Eloquent\Collection $formaciones
 * @property \Illuminate\Database\Eloquent\Collection $informacionesEscolares
 * @property \Illuminate\Database\Eloquent\Collection $informacionesLaborales
 * @property \Illuminate\Database\Eloquent\Collection $informacionesUniversitarias
 * @property string $nombre
 * @property string $nit
 * @property integer $lugar_id
 * @property string $direccion
 * @property string $barrio
 * @property string $correo
 * @property string $telefono
 * @property string $sitio_web
 * @property integer $sector_id
 * @property integer $actividad_economica_id
 * @property string $codigo_ies
 * @property boolean $acreditacion_ies
 * @property string $calendario
 * @property boolean $mi_universidad
 */
class Entidad extends Model implements Recordable
{

    public $table = 'entidad';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




    public $fillable = [
        'nombre',
        'nit',
        'lugar_id',
        'direccion',
        'barrio',
        'correo',
        'telefono',
        'sitio_web',
        'sector_id',
        'actividad_economica_id',
        'codigo_ies',
        'acreditacion_ies',
        'calendario',
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
        'nit' => 'string',
        'lugar_id' => 'integer',
        'direccion' => 'string',
        'barrio' => 'string',
        'correo' => 'string',
        'telefono' => 'string',
        'sitio_web' => 'string',
        'sector_id' => 'integer',
        'actividad_economica_id' => 'integer',
        'codigo_ies' => 'string',
        'acreditacion_ies' => 'boolean',
        'calendario' => 'string',
        'mi_universidad' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:200',
        'nit' => 'nullable|string|max:45',
        'lugar_id' => 'required|integer',
        'direccion' => 'nullable|string|max:200',
        'barrio' => 'nullable|string|max:150',
        'correo' => 'nullable|string|max:200',
        'telefono' => 'nullable|string|max:150',
        'sitio_web' => 'nullable|string|max:255',
        'sector_id' => 'nullable|integer',
        'actividad_economica_id' => 'nullable|integer',
        'codigo_ies' => 'nullable|string|max:10',
        'acreditacion_ies' => 'nullable|boolean',
        'calendario' => 'nullable|string',
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
    public function formaciones()
    {
        return $this->hasMany(\App\Models\Formaciones\Formacion::class, 'entidad_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function informacionesEscolares()
    {
        return $this->hasMany(\App\Models\Contactos\InformacionEscolar::class, 'entidad_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function informacionesLaborales()
    {
        return $this->hasMany(\App\Models\Contactos\InformacionLaboral::class, 'entidad_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function informacionesUniversitarias()
    {
        return $this->hasMany(\App\Models\Contactos\InformacionUniversitaria::class, 'entidad_id');
    }
}
