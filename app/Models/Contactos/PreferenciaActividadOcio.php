<?php

namespace App\Models\Contactos;

use Eloquent as Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class PreferenciaActividadOcio
 * @package App\Models\Contactos
 * @version November 19, 2020, 10:52 pm UTC
 *
 * @property \App\Models\Contactos\ActividadOcio $actividadOcio
 * @property \App\Models\Contactos\InformacionRelacional $informacionRelacional
 * @property integer $informacion_relacional_id
 * @property integer $actividad_ocio_id
 */
class PreferenciaActividadOcio extends Model implements Auditable
{

    public $table = 'preferencia_actividad_ocio';
    
    public $timestamps = false;

    use \OwenIt\Auditing\Auditable;

    public $fillable = [
        'informacion_relacional_id',
        'actividad_ocio_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'informacion_relacional_id' => 'integer',
        'actividad_ocio_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'informacion_relacional_id' => 'required|integer',
        'actividad_ocio_id' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function actividadOcio()
    {
        return $this->belongsTo(\App\Models\Contactos\ActividadOcio::class, 'actividad_ocio_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function informacionRelacional()
    {
        return $this->belongsTo(\App\Models\Contactos\InformacionRelacional::class, 'informacion_relacional_id');
    }
}
