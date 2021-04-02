<?php

namespace App\Models\Formaciones;

use Eloquent as Model;

/**
 * Class Facultad
 * @package App\Models\Formaciones
 * @version April 2, 2021, 4:18 pm -05
 *
 * @property \Illuminate\Database\Eloquent\Collection $facultadBuyerPersonas
 * @property \Illuminate\Database\Eloquent\Collection $formacions
 * @property string $nombre
 */
class Facultad extends Model
{

    public $table = 'facultad';
    
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
    public function facultadBuyerPersonas()
    {
        return $this->hasMany(\App\Models\Formaciones\FacultadBuyerPersona::class, 'facultad_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function formacions()
    {
        return $this->hasMany(\App\Models\Formaciones\Formacion::class, 'facultad_id');
    }
}
