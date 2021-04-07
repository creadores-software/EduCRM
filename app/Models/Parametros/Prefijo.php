<?php

namespace App\Models\Parametros;

use \Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class Prefijo
 * @package App\Models\Parametros
 * @version November 19, 2020, 10:53 pm UTC
 *
 * @property \App\Models\Parametros\Genero $genero
 * @property \Illuminate\Database\Eloquent\Collection $contactos
 * @property integer $genero_id
 * @property string $nombre
 */
class Prefijo extends Model implements Recordable
{

    public $table = 'prefijo';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;

    public $fillable = [
        'genero_id',
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'genero_id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'genero_id' => 'required|integer',
        'nombre' => 'required|string|max:45'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function genero()
    {
        return $this->belongsTo(\App\Models\Parametros\Genero::class, 'genero_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contactos()
    {
        return $this->hasMany(\App\Models\Parametros\Contacto::class, 'prefijo_id');
    }
}
