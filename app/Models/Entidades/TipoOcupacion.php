<?php

namespace App\Models\Entidades;

use Eloquent as Model;

/**
 * Class TipoOcupacion
 * @package App\Models\Entidades
 * @version November 19, 2020, 10:54 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $ocupacions
 * @property string $nombre
 */
class TipoOcupacion extends Model
{

    public $table = 'tipo_ocupacion';
    
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
    public function ocupacions()
    {
        return $this->hasMany(\App\Models\Entidades\Ocupacion::class, 'tipo_ocupacion_id');
    }
}
