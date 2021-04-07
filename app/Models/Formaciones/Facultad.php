<?php

namespace App\Models\Formaciones;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class Facultad
 * @package App\Models\Formaciones
 * @version April 2, 2021, 4:18 pm -05
 *
 * @property \Illuminate\Database\Eloquent\Collection $facultadBuyerPersonas
 * @property \Illuminate\Database\Eloquent\Collection $formaciones
 * @property string $nombre
 */
class Facultad extends Model implements Recordable
{

    public $table = 'facultad';
    
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
    public function facultadBuyerPersonas()
    {
        return $this->hasMany(\App\Models\Formaciones\FacultadBuyerPersona::class, 'facultad_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function formaciones()
    {
        return $this->hasMany(\App\Models\Formaciones\Formacion::class, 'facultad_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function perfilesBuyersPersona()
    {
        return $this->belongsToMany(\App\Models\Parametros\BuyerPersona::class, 'facultad_buyer_persona');
    }
}
