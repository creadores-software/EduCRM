<?php

namespace App\Models\Campanias;

use Eloquent as Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class JustificacionEstadoCampania
 * @package App\Models\Campanias
 * @version April 24, 2021, 2:04 pm -05
 *
 * @property \App\Models\Campanias\EstadoCampania $estadoCampania
 * @property \Illuminate\Database\Eloquent\Collection $oportunidads
 * @property integer $estado_campania_id
 * @property string $nombre
 * @property string $descripcion
 */
class JustificacionEstadoCampania extends Model implements Recordable
{

    public $table = 'justificacion_estado_campania';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




    public $fillable = [
        'estado_campania_id',
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
        'estado_campania_id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'estado_campania_id' => 'required|integer',
        'nombre' => 'required|string|max:45',
        'descripcion' => 'nullable|string|max:191'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estadoCampania()
    {
        return $this->belongsTo(\App\Models\Campanias\EstadoCampania::class, 'estado_campania_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function oportunidades()
    {
        return $this->hasMany(\App\Models\Campanias\Oportunidad::class, 'justificacion_estado_campania_id');
    }
}
