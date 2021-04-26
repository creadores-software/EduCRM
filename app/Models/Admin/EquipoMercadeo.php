<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class EquipoMercadeo
 * @package App\Models\Admin
 * @version April 24, 2021, 2:04 pm -05
 *
 * @property \Illuminate\Database\Eloquent\Collection $campania
 * @property \Illuminate\Database\Eloquent\Collection $pertenenciaEquipoMercadeos
 * @property string $nombre
 */
class EquipoMercadeo extends Model implements Recordable
{

    public $table = 'equipo_mercadeo';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




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
    public function campanias()
    {
        return $this->hasMany(\App\Models\Campanias\Campania::class, 'equipo_mercadeo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pertenencias()
    {
        return $this->hasMany(\App\Models\Admin\PertenenciaEquipoMercadeo::class, 'equipo_mercadeo_id');
    }
}
