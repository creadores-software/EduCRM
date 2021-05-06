<?php

namespace App\Models\Campanias;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class TipoEstadoColor
 * @package App\Models\Campanias
 * @version April 24, 2021, 2:04 pm -05
 *
 * @property \Illuminate\Database\Eloquent\Collection $estadoCampania
 * @property \Illuminate\Database\Eloquent\Collection $estadoInteraccions
 * @property string $nombre
 * @property string $color_hexadecimal
 */
class TipoEstadoColor extends Model implements Recordable
{

    public $table = 'tipo_estado_color';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




    public $fillable = [
        'nombre',
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
        'color_hexadecimal' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:45',
        'color_hexadecimal' => 'required|string|max:7'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function estadosCampania()
    {
        return $this->hasMany(\App\Models\Campanias\EstadoCampania::class, 'tipo_estado_color_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function estadosInteraccion()
    {
        return $this->hasMany(\App\Models\Campanias\EstadoInteraccion::class, 'tipo_estado_color_id');
    }

    public static function arrayColores(){
        return TipoEstadoColor::get(['id','color_hexadecimal as color'])
        ->keyBy('id')->toArray();
    }
}
