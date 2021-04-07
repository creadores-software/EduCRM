<?php

namespace App\Models\Contactos;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class PreferenciaFormacion
 * @package App\Models\Contactos
 * @version November 19, 2020, 10:53 pm UTC
 *
 * @property \App\Models\Contactos\Formacion $formacion
 * @property \App\Models\Contactos\InformacionRelacional $informacionRelacional
 * @property integer $informacion_relacional_id
 * @property integer $formacion_id
 */
class PreferenciaFormacion extends Model implements Recordable
{

    public $table = 'preferencia_formacion';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;

    public $fillable = [
        'informacion_relacional_id',
        'formacion_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'informacion_relacional_id' => 'integer',
        'formacion_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'informacion_relacional_id' => 'required|integer',
        'formacion_id' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function formacion()
    {
        return $this->belongsTo(\App\Models\Contactos\Formacion::class, 'formacion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function informacionRelacional()
    {
        return $this->belongsTo(\App\Models\Contactos\InformacionRelacional::class, 'informacion_relacional_id');
    }
}
