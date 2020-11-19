<?php

namespace App\Models\Parametros;

use Eloquent as Model;

/**
 * Class EstatusUsuario
 * @package App\Models\Parametros
 * @version November 19, 2020, 10:52 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $informacionRelacionals
 * @property string $nombre
 */
class EstatusUsuario extends Model
{

    public $table = 'estatus_usuario';
    
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
    public function informacionRelacionals()
    {
        return $this->hasMany(\App\Models\Parametros\InformacionRelacional::class, 'estatus_usuario_id');
    }
}
