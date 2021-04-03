<?php

namespace App\Models\Contactos;

use Eloquent as Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class PerfilMedioComunicacion
 * @package App\Models\Contactos
 * @version April 2, 2021, 4:17 pm -05
 *
 * @property \App\Models\Contactos\InformacionRelacional $informacionRelacional
 * @property \App\Models\Contactos\MedioComunicacion $medioComunicacion
 * @property integer $medio_comunicacion_id
 * @property integer $informacion_relacional_id
 * @property string $perfil
 */
class PerfilMedioComunicacion extends Model implements Recordable
{

    public $table = 'perfil_medio_comunicacion';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;

    public $fillable = [
        'medio_comunicacion_id',
        'informacion_relacional_id',
        'perfil'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'medio_comunicacion_id' => 'integer',
        'informacion_relacional_id' => 'integer',
        'perfil' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'medio_comunicacion_id' => 'required|integer',
        'informacion_relacional_id' => 'required|integer',
        'perfil' => 'required|string|max:150'
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
