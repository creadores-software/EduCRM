<?php

namespace App\Models\Entidades;

use \Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class Sector
 * @package App\Models\Entidades
 * @version November 19, 2020, 10:53 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $entidads
 * @property string $nombre
 */
class Sector extends Model implements Recordable
{

    public $table = 'sector';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;

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
        'nombre' => 'required|string|max:45'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function entidads()
    {
        return $this->hasMany(\App\Models\Entidades\Entidad::class, 'sector_id');
    }
}
