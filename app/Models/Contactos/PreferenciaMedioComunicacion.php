<?php

namespace App\Models\Contactos;

use Eloquent as Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class PreferenciaMedioComunicacion
 * @package App\Models\Contactos
 * @version November 19, 2020, 10:53 pm UTC
 *
 * @property \App\Models\Contactos\InformacionRelacional $informacionRelacional
 * @property \App\Models\Contactos\MedioComunicacion $medioComunicacion
 * @property integer $informacion_relacional_id
 * @property integer $medio_comunicacion_id
 */
class PreferenciaMedioComunicacion extends Model implements Recordable
{

    public $table = 'preferencia_medio_comunicacion';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;
    
    public $fillable = [
        'informacion_relacional_id',
        'medio_comunicacion_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'informacion_relacional_id' => 'integer',
        'medio_comunicacion_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'informacion_relacional_id' => 'required|integer',
        'medio_comunicacion_id' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function informacionRelacional()
    {
        return $this->belongsTo(\App\Models\Contactos\InformacionRelacional::class, 'informacion_relacional_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function medioComunicacion()
    {
        return $this->belongsTo(\App\Models\Contactos\MedioComunicacion::class, 'medio_comunicacion_id');
    }
}
