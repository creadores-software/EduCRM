<?php

namespace App\Models\Contactos;

use Eloquent as Model;

/**
 * Class InformacionAcademica
 * @package App\Models\Contactos
 * @version November 19, 2020, 10:52 pm UTC
 *
 * @property \App\Models\Contactos\Contacto $contacto
 * @property \App\Models\Contactos\Formacion $formacion
 * @property integer $contacto_id
 * @property integer $formacion_id
 * @property boolean $finalizado
 * @property string $fecha_grado_estimada
 * @property string $fecha_grado_real
 */
class InformacionAcademica extends Model
{

    public $table = 'informacion_academica';
    
    public $timestamps = false;




    public $fillable = [
        'contacto_id',
        'formacion_id',
        'finalizado',
        'fecha_grado_estimada',
        'fecha_grado_real'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'contacto_id' => 'integer',
        'formacion_id' => 'integer',
        'finalizado' => 'boolean',
        'fecha_grado_estimada' => 'date',
        'fecha_grado_real' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contacto_id' => 'required|integer',
        'formacion_id' => 'required|integer',
        'finalizado' => 'nullable|boolean',
        'fecha_grado_estimada' => 'nullable',
        'fecha_grado_real' => 'nullable'
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
    public function formacion()
    {
        return $this->belongsTo(\App\Models\Contactos\Formacion::class, 'formacion_id');
    }
}
