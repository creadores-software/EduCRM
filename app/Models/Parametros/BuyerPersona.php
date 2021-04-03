<?php

namespace App\Models\Parametros;

use Eloquent as Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class BuyerPersona
 * @package App\Models\Parametros
 * @version April 2, 2021, 4:19 pm -05
 *
 * @property \Illuminate\Database\Eloquent\Collection $facultadBuyerPersonas
 * @property \Illuminate\Database\Eloquent\Collection $formacionBuyerPersonas
 * @property \Illuminate\Database\Eloquent\Collection $personaBuyerPersonas
 * @property string $nombre
 * @property string $descripcion
 */
class BuyerPersona extends Model implements Recordable
{

    public $table = 'buyer_persona';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;

    public $fillable = [
        'nombre',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:45',
        'descripcion' => 'nullable|string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function facultadBuyerPersonas()
    {
        return $this->hasMany(\App\Models\Parametros\FacultadBuyerPersona::class, 'buyer_persona_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function formacionBuyerPersonas()
    {
        return $this->hasMany(\App\Models\Parametros\FormacionBuyerPersona::class, 'buyer_persona_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function personaBuyerPersonas()
    {
        return $this->hasMany(\App\Models\Parametros\PersonaBuyerPersona::class, 'buyer_persona_id');
    }
}
