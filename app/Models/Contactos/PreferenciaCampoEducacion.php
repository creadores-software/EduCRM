<?php

namespace App\Models\Contactos;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class PreferenciaCampoEducacion
 * @package App\Models\Contactos
 * @version November 19, 2020, 10:53 pm UTC
 *
 * @property \App\Models\Contactos\CampoEducacion $campoEducacion
 * @property \App\Models\Contactos\InformacionRelacional $informacionRelacional
 * @property integer $campo_educacion_id
 * @property integer $informacion_relacional_id
 */
class PreferenciaCampoEducacion extends Model implements Recordable
{

    public $table = 'preferencia_campo_educacion';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;

    public $fillable = [
        'campo_educacion_id',
        'informacion_relacional_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'campo_educacion_id' => 'integer',
        'informacion_relacional_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'campo_educacion_id' => 'required|integer',
        'informacion_relacional_id' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function campoEducacion()
    {
        return $this->belongsTo(\App\Models\Contactos\CampoEducacion::class, 'campo_educacion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function informacionRelacional()
    {
        return $this->belongsTo(\App\Models\Contactos\InformacionRelacional::class, 'informacion_relacional_id');
    }
}
