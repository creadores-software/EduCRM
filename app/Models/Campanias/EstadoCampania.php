<?php

namespace App\Models\Campanias;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class EstadoCampania
 * @package App\Models\Campanias
 * @version April 24, 2021, 2:04 pm -05
 *
 * @property \App\Models\Campanias\TipoEstadoColor $tipoEstadoColor
 * @property \Illuminate\Database\Eloquent\Collection $justificacionEstadoCampania
 * @property \Illuminate\Database\Eloquent\Collection $oportunidads
 * @property \Illuminate\Database\Eloquent\Collection $tipoCampaniaEstados
 * @property string $nombre
 * @property string $descripcion
 * @property integer $tipo_estado_color_id
 */
class EstadoCampania extends Model implements Recordable
{

    public $table = 'estado_campania';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




    public $fillable = [
        'nombre',
        'descripcion',
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
        'tipo_estado_color_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:45',
        'descripcion' => 'nullable|string|max:255',
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
    public function justificacionEstadoCampania()
    {
        return $this->hasMany(\App\Models\Campanias\JustificacionEstadoCampania::class, 'estado_campania_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function oportunidads()
    {
        return $this->hasMany(\App\Models\Campanias\Oportunidad::class, 'estado_campania_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tipoCampaniaEstados()
    {
        return $this->hasMany(\App\Models\Campanias\TipoCampaniaEstados::class, 'estado_campania_id');
    }
}
