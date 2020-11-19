<?php

namespace App\Models\Entidades;

use Eloquent as Model;

/**
 * Class Ocupacion
 * @package App\Models\Entidades
 * @version November 19, 2020, 10:53 pm UTC
 *
 * @property \App\Models\Entidades\TipoOcupacion $tipoOcupacion
 * @property \Illuminate\Database\Eloquent\Collection $informacionLaborals
 * @property \Illuminate\Database\Eloquent\Collection $informacionRelacionals
 * @property string $nombre
 * @property integer $tipo_ocupacion_id
 */
class Ocupacion extends Model
{

    public $table = 'ocupacion';
    
    public $timestamps = false;




    public $fillable = [
        'nombre',
        'tipo_ocupacion_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'tipo_ocupacion_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:150',
        'tipo_ocupacion_id' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipoOcupacion()
    {
        return $this->belongsTo(\App\Models\Entidades\TipoOcupacion::class, 'tipo_ocupacion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function informacionLaborals()
    {
        return $this->hasMany(\App\Models\Entidades\InformacionLaboral::class, 'ocupacion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function informacionRelacionals()
    {
        return $this->hasMany(\App\Models\Entidades\InformacionRelacional::class, 'ocupacion_actual_id');
    }
}
