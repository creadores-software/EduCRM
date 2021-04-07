<?php

namespace App\Models\Entidades;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class TipoOcupacion
 * @package App\Models\Entidades
 * @version April 4, 2021, 1:01 pm -05
 *
 * @property \Illuminate\Database\Eloquent\Collection $ocupacions
 * @property string $nombre
 */
class TipoOcupacion extends Model implements Recordable
{

    public $table = 'tipo_ocupacion';
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
        'nombre' => 'required|string|max:150'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function ocupacions()
    {
        return $this->hasMany(\App\Models\Entidades\Ocupacion::class, 'tipo_ocupacion_id');
    }
}
