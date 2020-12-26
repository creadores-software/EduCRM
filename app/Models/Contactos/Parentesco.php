<?php

namespace App\Models\Contactos;

use Eloquent as Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class Parentesco
 * @package App\Models\Contactos
 * @version November 20, 2020, 3:28 am UTC
 *
 * @property \App\Models\Contactos\Contacto $contactoDestino
 * @property \App\Models\Contactos\Contacto $contactoOrigen
 * @property \App\Models\Contactos\TipoParentesco $tipoParentesco
 * @property integer $contacto_origen
 * @property integer $contacto_destino
 * @property integer $tipo_parentesco_id
 * @property boolean $acudiente
 */
class Parentesco extends Model implements Recordable
{

    public $table = 'parentesco';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;

    public $fillable = [
        'contacto_origen',
        'contacto_destino',
        'tipo_parentesco_id',
        'acudiente'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'contacto_origen' => 'integer',
        'contacto_destino' => 'integer',
        'tipo_parentesco_id' => 'integer',
        'acudiente' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contacto_origen' => 'required|integer',
        'contacto_destino' => 'required|integer',
        'tipo_parentesco_id' => 'required|integer',
        'acudiente' => 'nullable|boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function contactoDestino()
    {
        return $this->belongsTo(\App\Models\Contactos\Contacto::class, 'contacto_destino');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function contactoOrigen()
    {
        return $this->belongsTo(\App\Models\Contactos\Contacto::class, 'contacto_origen');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipoParentesco()
    {
        return $this->belongsTo(\App\Models\Parametros\TipoParentesco::class, 'tipo_parentesco_id')
         ->withDefault(['nombre' => '']);
    }
}
