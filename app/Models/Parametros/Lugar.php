<?php

namespace App\Models\Parametros;

use Eloquent as Model;

/**
 * Class Lugar
 * @package App\Models\Parametros
 * @version November 19, 2020, 10:52 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $contactos
 * @property \Illuminate\Database\Eloquent\Collection $entidads
 * @property string $nombre
 * @property string $tipo
 * @property integer $padre_id
 */
class Lugar extends Model
{

    public $table = 'lugar';
    
    public $timestamps = false;




    public $fillable = [
        'nombre',
        'tipo',
        'padre_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'tipo' => 'string',
        'padre_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:255',
        'tipo' => 'required|string',
        'padre_id' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contactos()
    {
        return $this->hasMany(\App\Models\Parametros\Contacto::class, 'lugar_residencia');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function entidads()
    {
        return $this->hasMany(\App\Models\Parametros\Entidad::class, 'lugar_id');
    }
}
