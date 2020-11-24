<?php

namespace App\Models\Entidades;

use Eloquent as Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class CategoriaActividadEconomica
 * @package App\Models\Entidades
 * @version November 19, 2020, 10:51 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $actividadEconomicas
 * @property string $nombre
 */
class CategoriaActividadEconomica extends Model implements Auditable
{

    public $table = 'categoria_actividad_economica';
    
    public $timestamps = false;

    use \OwenIt\Auditing\Auditable;

    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:150'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function actividadEconomicas()
    {
        return $this->hasMany(\App\Models\Entidades\ActividadEconomica::class, 'categoria_actividad_economica_id');
    }
}
