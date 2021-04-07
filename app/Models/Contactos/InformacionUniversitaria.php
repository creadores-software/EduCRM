<?php

namespace App\Models\Contactos;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class InformacionUniversitaria
 * @package App\Models\Contactos
 * @version April 5, 2021, 10:54 pm -05
 *
 * @property \App\Models\Contactos\Contacto $contacto
 * @property \App\Models\Contactos\Entidad $entidad
 * @property \App\Models\Contactos\Formacion $formacion
 * @property \App\Models\Contactos\TipoAcceso $tipoAcceso
 * @property integer $contacto_id
 * @property integer $entidad_id
 * @property integer $formacion_id
 * @property integer $tipo_acceso_id
 * @property string $fecha_inicio
 * @property string $fecha_grado
 * @property boolean $finalizado
 * @property number $promedio
 * @property integer $periodo_alcanzado
 */
class InformacionUniversitaria extends Model implements Recordable
{

    public $table = 'informacion_universitaria';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




    public $fillable = [
        'contacto_id',
        'entidad_id',
        'formacion_id',
        'tipo_acceso_id',
        'fecha_inicio',
        'fecha_grado',
        'finalizado',
        'promedio',
        'periodo_alcanzado'
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
        'tipo_acceso_id' => 'integer',
        'fecha_inicio' => 'date',
        'fecha_grado' => 'date',
        'finalizado' => 'boolean',
        'promedio' => 'float',
        'periodo_alcanzado' => 'integer'
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
        'tipo_acceso_id' => 'nullable|integer',
        'fecha_inicio' => 'nullable',
        'fecha_grado' => 'nullable',
        'finalizado' => 'nullable|boolean',
        'promedio' => 'nullable|numeric',
        'periodo_alcanzado' => 'nullable|integer'
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipoAcceso()
    {
        return $this->belongsTo(\App\Models\Formaciones\TipoAcceso::class, 'tipo_acceso_id')
            ->withDefault(['nombre' => '']);
    }
}
