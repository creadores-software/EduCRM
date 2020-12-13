<?php

namespace App\Models\Contactos;

use Eloquent as Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class ContactoTipoContacto
 * @package App\Models\Contactos
 * @version November 19, 2020, 10:51 pm UTC
 *
 * @property \App\Models\Contactos\Contacto $contacto
 * @property \App\Models\Contactos\TipoContacto $tipoContacto
 * @property integer $tipo_contacto_id
 * @property integer $contacto_id
 */
class ContactoTipoContacto extends Model implements Recordable
{

    public $table = 'contacto_tipo_contacto';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;

    public $fillable = [
        'tipo_contacto_id',
        'contacto_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tipo_contacto_id' => 'integer',
        'contacto_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tipo_contacto_id' => 'required|integer',
        'contacto_id' => 'required|integer'
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
    public function tipoContacto()
    {
        return $this->belongsTo(\App\Models\Contactos\TipoContacto::class, 'tipo_contacto_id');
    }
}
