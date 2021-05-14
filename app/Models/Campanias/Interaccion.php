<?php

namespace App\Models\Campanias;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class Interaccion
 * @package App\Models\Campanias
 * @version May 13, 2021, 8:05 pm -05
 *
 * @property \App\Models\Campanias\Contacto $contacto
 * @property \App\Models\Campanias\EstadoInteraccion $estadoInteraccion
 * @property \App\Models\Campanias\Oportunidad $oportunidad
 * @property \App\Models\Campanias\TipoInteraccion $tipoInteraccion
 * @property \App\Models\Campanias\User $users
 * @property string|\Carbon\Carbon $fecha_inicio
 * @property string|\Carbon\Carbon $fecha_fin
 * @property integer $tipo_interaccion_id
 * @property integer $estado_interaccion_id
 * @property string $observacion
 * @property integer $oportunidad_id
 * @property integer $contacto_id
 * @property integer $users_id
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
        'contacto_id',
        'users_id'
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
        'contacto_id' => 'integer',
        'users_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fecha_inicio' => 'required|after_or_equal:today',
        'fecha_fin' => 'required|after_or_equal:today',
        'tipo_interaccion_id' => 'required|integer',
        'estado_interaccion_id' => 'required|integer',
        'observacion' => 'string|max:255',
        'oportunidad_id' => 'nullable|integer',
        'contacto_id' => 'nullable|integer',
        'users_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function contacto()
    {
        return $this->belongsTo(\App\Models\Campanias\Contacto::class, 'contacto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estadoInteraccion()
    {
        return $this->belongsTo(\App\Models\Campanias\EstadoInteraccion::class, 'estado_interaccion_id');
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
        return $this->belongsTo(\App\Models\Campanias\TipoInteraccion::class, 'tipo_interaccion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function users()
    {
        return $this->belongsTo(\App\Models\Campanias\User::class, 'users_id');
    }
}
