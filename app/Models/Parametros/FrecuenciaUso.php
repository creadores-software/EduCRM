<?php

namespace App\Models\Parametros;

use Eloquent as Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class FrecuenciaUso
 * @package App\Models\Parametros
 * @version November 19, 2020, 10:52 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $informacionRelacionales
 * @property string $nombre
 */
class FrecuenciaUso extends Model implements Recordable
{

    public $table = 'frecuencia_uso';
    
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
        return $this->hasMany(\App\Models\Parametros\InformacionRelacional::class, 'frecuencia_uso_id');
    }
}
