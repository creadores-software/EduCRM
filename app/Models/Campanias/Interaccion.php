<?php

namespace App\Models\Campanias;

use Eloquent as Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class Interaccion
 * @package App\Models\Campanias
 * @version April 24, 2021, 2:04 pm -05
 *
 * @property \App\Models\Campanias\Contacto $contacto
 * @property \App\Models\Campanias\EstadoInteraccion $estadoInteraccion
 * @property \App\Models\Campanias\Oportunidad $oportunidad
 * @property \App\Models\Campanias\TipoInteraccion $tipoInteraccion
 * @property string|\Carbon\Carbon $fecha_inicio
 * @property string|\Carbon\Carbon $fecha_fin
 * @property integer $tipo_interaccion_id
 * @property integer $estado_interaccion_id
 * @property string $observacion
 * @property integer $oportunidad_id
 * @property integer $contacto_id
 */
class Interaccion extends Model implements Recordable
{

    public $table = 'interaccion';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




    public $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'tipo_interaccion_id',
        'estado_interaccion_id',
        'observacion',
        'oportunidad_id',
        'contacto_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fecha_inicio' => 'datetime',
        'fecha_fin' => 'datetime',
        'tipo_interaccion_id' => 'integer',
        'estado_interaccion_id' => 'integer',
        'observacion' => 'string',
        'oportunidad_id' => 'integer',
        'contacto_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fecha_inicio' => 'required',
        'fecha_fin' => 'required',
        'tipo_interaccion_id' => 'required|integer',
        'estado_interaccion_id' => 'required|integer',
        'observacion' => 'nullable|string|max:191',
        'oportunidad_id' => 'nullable|integer',
        'contacto_id' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function contacto()
    {
        return $this->belongsTo(\App\Models\Contactos\Contacto::class, 'contacto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estadoInteraccion()
    {
        return $this->belongsTo(\App\Models\Campanias\EstadoInteraccion::class, 'estado_interaccion_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function oportunidad()
    {
        return $this->belongsTo(\App\Models\Campanias\Oportunidad::class, 'oportunidad_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipoInteraccion()
    {
        return $this->belongsTo(\App\Models\Campanias\TipoInteraccion::class, 'tipo_interaccion_id')
            ->withDefault(['nombre' => '']);
    }
}
