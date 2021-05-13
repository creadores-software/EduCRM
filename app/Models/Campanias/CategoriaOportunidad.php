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
 * @property integer $capacidad_minima
 * @property integer $capacidad_maxima
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
        'capacidad_minima',
        'capacidad_maxima',
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
        'capacidad_minima' => 'integer',
        'capacidad_maxima' => 'integer',
        'color_hexadecimal' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:45',
        'descripcion' => 'nullable|string|max:255',
        'interes_minimo' => 'required|integer',
        'interes_maximo' => 'required|integer',
        'capacidad_minima' => 'required|integer',
        'capacidad_maxima' => 'required|integer',
        'color_hexadecimal' => 'required|string|max:7'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function oportunidades()
    {
        return $this->hasMany(\App\Models\Campanias\Oportunidad::class, 'categoria_oportunidad_id');
    }


    public static function arrayColores(){
        return CategoriaOportunidad::
        get(['categoria_oportunidad.id','color_hexadecimal as color'])
        ->keyBy('id')->toArray();
    }

    public static function stars($cantidad){
        $stars="";
        for($i=0;$i<$cantidad;$i++){
            $stars.="<i class='fa fa-star'></i>";    
        }
        return $stars;
    }
}
