<?php

namespace App\Models\Parametros;

use Eloquent as Model;

/**
 * Class MedioComunicacion
 * @package App\Models\Parametros
 * @version November 19, 2020, 10:53 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $preferenciaMedioComunicacions
 * @property string $nombre
 */
class MedioComunicacion extends Model
{

    public $table = 'medio_comunicacion';
    
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
    public function preferenciaMedioComunicacions()
    {
        return $this->hasMany(\App\Models\Parametros\PreferenciaMedioComunicacion::class, 'medio_comunicacion_id');
    }
}
