<?php

namespace App\Models\Campanias;

use Eloquent as Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class MatrizGestion
 * @package App\Models\Campanias
 * @version April 24, 2021, 2:04 pm -05
 *
 * @property string $accion
 * @property string $descripcion
 * @property integer $interes_minimo
 * @property integer $interes_maximo
 * @property integer $probabilidad_minima
 * @property integer $probabilidad_maxima
 * @property string $color_hexadecimal
 */
class MatrizGestion extends Model implements Recordable
{

    public $table = 'matriz_gestion';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




    public $fillable = [
        'accion',
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
        'accion' => 'string',
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
        'accion' => 'required|string|max:45',
        'descripcion' => 'nullable|string|max:191',
        'interes_minimo' => 'required|integer',
        'interes_maximo' => 'required|integer',
        'probabilidad_minima' => 'required|integer',
        'probabilidad_maxima' => 'required|integer',
        'color_hexadecimal' => 'required|string|max:7'
    ];

    
}
