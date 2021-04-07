<?php

namespace App\Models\Parametros;

use \Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class ActitudServicio
 * @package App\Models\Parametros
 * @version November 19, 2020, 10:48 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $informacionRelacionales
 * @property string $nombre
 */
class ActitudServicio extends Model implements Recordable
{

    public $table = 'actitud_servicio';
    
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
    public function informacionRelacionales()
    {
        return $this->hasMany(\App\Models\Parametros\InformacionRelacional::class, 'actitud_servicio_id');
    }
}
