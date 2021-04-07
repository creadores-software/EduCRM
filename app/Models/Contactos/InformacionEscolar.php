<?php

namespace App\Models\Contactos;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

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
 * @property string $fecha_inicio
 * @property string $fecha_grado
 * @property string $grado
 */
class InformacionEscolar extends Model implements Recordable
{

    public $table = 'informacion_escolar';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;

    public $fillable = [
        'contacto_id',
        'entidad_id',
        'nivel_educativo_id',
        'finalizado',
        'fecha_inicio',
        'fecha_grado',
        'grado'
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
        'fecha_inicio' => 'date',
        'fecha_grado' => 'date',
        'grado' => 'string'
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
        'fecha_inicio' => 'nullable|before_or_equal:today',
        'fecha_grado' => 'nullable',
        'grado' => 'nullable|string|max:45'
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
    public function nivelEducativo()
    {
        return $this->belongsTo(\App\Models\Formaciones\NivelFormacion::class, 'nivel_educativo_id')
            ->withDefault(['nombre' => '']);
    }
}
