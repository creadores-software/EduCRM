<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class PertenenciaEquipoMercadeo
 * @package App\Models\Admin
 * @version April 24, 2021, 2:04 pm -05
 *
 * @property \App\Models\Admin\EquipoMercadeo $equipoMercadeo
 * @property \App\Models\Admin\User $users
 * @property integer $users_id
 * @property integer $equipo_mercadeo_id
 * @property boolean $es_lider
 */
class PertenenciaEquipoMercadeo extends Model implements Recordable
{

    public $table = 'pertenencia_equipo_mercadeo';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




    public $fillable = [
        'users_id',
        'equipo_mercadeo_id',
        'es_lider'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'users_id' => 'integer',
        'equipo_mercadeo_id' => 'integer',
        'es_lider' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'users_id' => 'required',
        'equipo_mercadeo_id' => 'required|integer',
        'es_lider' => 'nullable|boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function equipoMercadeo()
    {
        return $this->belongsTo(\App\Models\Admin\EquipoMercadeo::class, 'equipo_mercadeo_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\Admin\User::class, 'users_id')
            ->withDefault(['name' => '']);
    }
}
