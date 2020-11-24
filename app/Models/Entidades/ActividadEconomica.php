<?php

namespace App\Models\Entidades;

use Eloquent as Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class ActividadEconomica
 * @package App\Models\Entidades
 * @version November 19, 2020, 10:50 pm UTC
 *
 * @property \App\Models\Entidades\CategoriaActividadEconomica $categoriaActividadEconomica
 * @property \Illuminate\Database\Eloquent\Collection $entidads
 * @property integer $categoria_actividad_economica_id
 * @property string $nombre
 * @property boolean $es_ies
 * @property boolean $es_colegio
 */
class ActividadEconomica extends Model implements Auditable
{

    public $table = 'actividad_economica';
    
    public $timestamps = false;

    use \OwenIt\Auditing\Auditable;

    public $fillable = [
        'categoria_actividad_economica_id',
        'nombre',
        'es_ies',
        'es_colegio'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'categoria_actividad_economica_id' => 'integer',
        'nombre' => 'string',
        'es_ies' => 'boolean',
        'es_colegio' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'categoria_actividad_economica_id' => 'required|integer',
        'nombre' => 'required|string|max:150',
        'es_ies' => 'nullable|boolean',
        'es_colegio' => 'nullable|boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function categoriaActividadEconomica()
    {
        return $this->belongsTo(\App\Models\Entidades\CategoriaActividadEconomica::class, 'categoria_actividad_economica_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function entidads()
    {
        return $this->hasMany(\App\Models\Entidades\Entidad::class, 'actividad_economica_id');
    }
}
