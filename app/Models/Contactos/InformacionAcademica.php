<?php

namespace App\Models\Contactos;

use Eloquent as Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class InformacionAcademica
 * @package App\Models\Contactos
 * @version December 25, 2020, 12:27 pm -05
 *
 * @property \App\Models\Contactos\Contacto $contacto
 * @property \App\Models\Contactos\Entidad $entidad
 * @property \App\Models\Contactos\Formacion $formacion
 * @property integer $contacto_id
 * @property integer $entidad_id
 * @property integer $formacion_id
 * @property boolean $finalizado
 * @property string $fecha_inicio
 * @property string $fecha_grado
 */
class InformacionAcademica extends Model implements Recordable
{

    public $table = 'informacion_academica';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;


    public $fillable = [
        'contacto_id',
        'entidad_id',
        'formacion_id',
        'finalizado',
        'fecha_inicio',
        'fecha_grado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'contacto_id' => 'integer',
        'entidad_id' => 'integer',
        'formacion_id' => 'integer',
        'finalizado' => 'boolean',
        'fecha_inicio' => 'date',
        'fecha_grado' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contacto_id' => 'required|integer',
        'entidad_id' => 'required|integer',
        'formacion_id' => 'required|integer',
        'finalizado' => 'nullable|boolean',
        'fecha_inicio' => 'nullable|before_or_equal:today',
        'fecha_grado' => 'nullable'
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
    public function entidad()
    {
        return $this->belongsTo(\App\Models\Entidades\Entidad::class, 'entidad_id')
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
}
