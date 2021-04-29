<?php

namespace App\Models\Campanias;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class CategoriaOportunidad
 * @package App\Models\Campanias
 * @version April 28, 2021, 10:01 pm -05
 *
 * @property \Illuminate\Database\Eloquent\Collection $oportunidades
 * @property string $nombre
 * @property string $descripcion
 * @property integer $interes_minimo
 * @property integer $interes_maximo
 * @property integer $probabilidad_minima
 * @property integer $probabilidad_maxima
 * @property string $color_hexadecimal
 */
class CategoriaOportunidad extends Model implements Recordable
{

    public $table = 'categoria_oportunidad';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




    public $fillable = [
        'nombre',
        'descripcion',
        'interes_minimo',
        'interes_maximo',
        'probabilidad_minima',
        'probabilidad_maxima',
        'color_hexadecimal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string',
        'interes_minimo' => 'integer',
        'interes_maximo' => 'integer',
        'probabilidad_minima' => 'integer',
        'probabilidad_maxima' => 'integer',
        'color_hexadecimal' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:45',
        'descripcion' => 'nullable|string|max:191',
        'interes_minimo' => 'required|integer',
        'interes_maximo' => 'required|integer',
        'probabilidad_minima' => 'required|integer',
        'probabilidad_maxima' => 'required|integer',
        'color_hexadecimal' => 'required|string|max:7'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function oportunidades()
    {
        return $this->hasMany(\App\Models\Campanias\Oportunidad::class, 'categoria_oportunidad_id');
    }
}
