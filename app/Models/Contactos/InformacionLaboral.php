<?php

namespace App\Models\Contactos;

use Eloquent as Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class InformacionLaboral
 * @package App\Models\Contactos
 * @version November 19, 2020, 10:52 pm UTC
 *
 * @property \App\Models\Contactos\Ocupacion $ocupacion
 * @property \App\Models\Contactos\Contacto $contacto
 * @property \App\Models\Contactos\Entidad $entidad
 * @property integer $contacto_id
 * @property integer $entidad_id
 * @property integer $ocupacion_id
 * @property string $area
 * @property string $funciones
 * @property string $telefono
 * @property string $fecha_inicio
 * @property string $fecha_fin
 */
class InformacionLaboral extends Model implements Recordable
{

    public $table = 'informacion_laboral';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;

    public $fillable = [
        'contacto_id',
        'entidad_id',
        'ocupacion_id',
        'area',
        'funciones',
        'telefono',
        'fecha_inicio',
        'fecha_fin'
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
        'ocupacion_id' => 'integer',
        'area' => 'string',
        'funciones' => 'string',
        'telefono' => 'string',
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contacto_id' => 'required|integer',
        'entidad_id' => 'required|integer',
        'ocupacion_id' => 'required|integer',
        'area' => 'nullable|string|max:45',
        'funciones' => 'nullable|string|max:255',
        'telefono' => 'nullable|string|max:15',
        'fecha_inicio' => 'required|before_or_equal:today',
        'fecha_fin' => 'nullable|after:fecha_inicio|before_or_equal:today'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ocupacion()
    {
        return $this->belongsTo(\App\Models\Entidades\Ocupacion::class, 'ocupacion_id')
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
    public function entidad()
    {
        return $this->belongsTo(\App\Models\Entidades\Entidad::class, 'entidad_id')
            ->withDefault(['nombre' => '']);
    }
}
