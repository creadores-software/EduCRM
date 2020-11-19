<?php

namespace App\Models\Contactos;

use Eloquent as Model;

/**
 * Class InformacionEscolar
 * @package App\Models\Contactos
 * @version November 19, 2020, 10:52 pm UTC
 *
 * @property \App\Models\Contactos\Contacto $contacto
 * @property \App\Models\Contactos\Entidad $entidad
 * @property \App\Models\Contactos\NivelFormacion $nivelEducativo
 * @property integer $contacto_id
 * @property integer $entidad_id
 * @property integer $nivel_educativo_id
 * @property boolean $finalizado
 * @property string $fecha_grado_estimada
 * @property string $fecha_grado_real
 */
class InformacionEscolar extends Model
{

    public $table = 'informacion_escolar';
    
    public $timestamps = false;




    public $fillable = [
        'contacto_id',
        'entidad_id',
        'nivel_educativo_id',
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
        'entidad_id' => 'integer',
        'nivel_educativo_id' => 'integer',
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
        'entidad_id' => 'required|integer',
        'nivel_educativo_id' => 'required|integer',
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
    public function entidad()
    {
        return $this->belongsTo(\App\Models\Contactos\Entidad::class, 'entidad_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function nivelEducativo()
    {
        return $this->belongsTo(\App\Models\Contactos\NivelFormacion::class, 'nivel_educativo_id');
    }
}
