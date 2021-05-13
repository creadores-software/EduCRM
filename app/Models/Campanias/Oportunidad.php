<?php

namespace App\Models\Campanias;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class Oportunidad
 * @package App\Models\Campanias
 * @version April 24, 2021, 2:04 pm -05
 *
 * @property \App\Models\Campanias\Campania $campania
 * @property \App\Models\Campanias\Contacto $contacto
 * @property \App\Models\Campanias\EstadoCampania $estadoCampania
 * @property \App\Models\Campanias\Formacion $formacion
 * @property \App\Models\Campanias\JustificacionEstadoCampania $justificacionEstadoCampania
 * @property \Illuminate\Database\Eloquent\Collection $interaccions
 * @property integer $campania_id
 * @property integer $contacto_id
 * @property integer $formacion_id
 * @property integer $responsable_id
 * @property integer $estado_campania_id
 * @property integer $justificacion_estado_campania_id
 * @property integer $interes
 * @property integer $capacidad
 * @property integer $categoria_oportunidad_id
 * @property number $ingreso_recibido
 * @property number $ingreso_proyectado
 * @property boolean $adicion_manual
 * @property string|\Carbon\Carbon $ultima_actualizacion
 * @property string|\Carbon\Carbon $ultima_interaccion
 */
class Oportunidad extends Model implements Recordable
{

    public $table = 'oportunidad';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




    public $fillable = [
        'campania_id',
        'contacto_id',
        'formacion_id',
        'responsable_id',
        'estado_campania_id',
        'justificacion_estado_campania_id',
        'interes',
        'capacidad',
        'categoria_oportunidad_id',
        'ingreso_recibido',
        'ingreso_proyectado',
        'adicion_manual',
        'ultima_actualizacion',
        'ultima_interaccion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'campania_id' => 'integer',
        'contacto_id' => 'integer',
        'formacion_id' => 'integer',
        'responsable_id' => 'integer',
        'estado_campania_id' => 'integer',
        'justificacion_estado_campania_id' => 'integer',
        'interes' => 'integer',
        'capacidad' => 'integer',
        'categoria_oportunidad_id' => 'integer',
        'ingreso_recibido' => 'float',
        'ingreso_proyectado' => 'float',
        'adicion_manual' => 'boolean',
        'ultima_actualizacion' => 'datetime',
        'ultima_interaccion' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'campania_id' => 'required|integer',
        'contacto_id' => 'required|integer',
        'formacion_id' => 'required|integer',
        'responsable_id' => 'nullable|integer',
        'estado_campania_id' => 'required|integer',
        'justificacion_estado_campania_id' => 'required|integer',
        'interes' => 'nullable|integer',
        'capacidad' => 'nullable|integer',
        'categoria_oportunidad_id' => 'nullable|integer',
        'ingreso_recibido' => 'nullable|numeric|min:0',
        'ingreso_proyectado' => 'nullable|numeric|min:0',
        'adicion_manual' => 'nullable|boolean',
        'ultima_actualizacion' => 'nullable',
        'ultima_interaccion' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function categoriaOportunidad()
    {
        return $this->belongsTo(\App\Models\Campanias\CategoriaOportunidad::class, 'categoria_oportunidad_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function campania()
    {
        return $this->belongsTo(\App\Models\Campanias\Campania::class, 'campania_id')
            ->withDefault(['nombre' => '']);
    }

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
    public function estadoCampania()
    {
        return $this->belongsTo(\App\Models\Campanias\EstadoCampania::class, 'estado_campania_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function formacion()
    {
        return $this->belongsTo(\App\Models\Formaciones\Formacion::class, 'formacion_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function justificacionEstadoCampania()
    {
        return $this->belongsTo(\App\Models\Campanias\JustificacionEstadoCampania::class, 'justificacion_estado_campania_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function responsable()
    {
        return $this->belongsTo(\App\Models\Admin\User::class, 'responsable_id')
            ->withDefault(['name' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function interacciones()
    {
        return $this->hasMany(\App\Models\Campanias\Interaccion::class, 'oportunidad_id');
    }

    public static function arrayColores(){
        return Oportunidad::
        join('estado_campania as estado', 'estado.id', '=', 'oportunidad.estado_campania_id')
        ->join('tipo_estado_color as tipoEstado', 'estado.tipo_estado_color_id', '=', 'tipoEstado.id')
        ->get(['oportunidad.id as id_oportunidad','tipoEstado.color_hexadecimal as color'])
        ->keyBy('id_oportunidad')->toArray();
    }
}
