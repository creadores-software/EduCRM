<?php

namespace App\Models\Formaciones;

use Eloquent as Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class Jornada
 * @package App\Models\Formaciones
 * @version April 24, 2021, 2:04 pm -05
 *
 * @property \Illuminate\Database\Eloquent\Collection $formacions
 * @property string $nombre
 */
class Jornada extends Model implements Recordable
{

    public $table = 'jornada';
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
    public function formaciones()
    {
        return $this->hasMany(\App\Models\Formaciones\Formacion::class, 'jornada_id');
    }
}
