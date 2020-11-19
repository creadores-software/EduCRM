<?php

namespace App\Models\Parametros;

use Eloquent as Model;

/**
 * Class EstadoDisposicion
 * @package App\Models\Parametros
 * @version November 19, 2020, 10:52 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $informacionRelacionals
 * @property string $nombre
 */
class EstadoDisposicion extends Model
{

    public $table = 'estado_disposicion';
    
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
        return $this->hasMany(\App\Models\Parametros\InformacionRelacional::class, 'estado_disposicion_id');
    }
}
