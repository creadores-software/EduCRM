<?php

namespace App\Models\Campanias;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class EstadoInteraccion
 * @package App\Models\Campanias
 * @version April 24, 2021, 2:04 pm -05
 *
 * @property \App\Models\Campanias\TipoEstadoColor $tipoEstadoColor
 * @property \Illuminate\Database\Eloquent\Collection $interaccions
 * @property \Illuminate\Database\Eloquent\Collection $tipoInteraccionEstados
 * @property string $nombre
 * @property string $descripcion
 * @property boolean $por_defecto
 * @property integer $tipo_estado_color_id
 */
class EstadoInteraccion extends Model implements Recordable
{

    public $table = 'estado_interaccion';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




    public $fillable = [
        'nombre',
        'descripcion',
        'por_defecto',
        'tipo_estado_color_id'
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
        'por_defecto' => 'boolean',
        'tipo_estado_color_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:45',
        'descripcion' => 'nullable|string|max:191',
        'por_defecto' => 'nullable|boolean',
        'tipo_estado_color_id' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipoEstadoColor()
    {
        return $this->belongsTo(\App\Models\Campanias\TipoEstadoColor::class, 'tipo_estado_color_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function interacciones()
    {
        return $this->hasMany(\App\Models\Campanias\Interaccion::class, 'estado_interaccion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tipoInteraccionEstados()
    {
        return $this->hasMany(\App\Models\Campanias\TipoInteraccionEstados::class, 'estado_interaccion_id');
    }
}
