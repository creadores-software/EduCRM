<?php

namespace App\Models\Contactos;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class PersonaBuyerPersona
 * @package App\Models\Contactos
 * @version April 2, 2021, 4:18 pm -05
 *
 * @property \App\Models\Contactos\BuyerPersona $buyerPersona
 * @property \App\Models\Contactos\InformacionRelacional $informacionRelacional
 * @property integer $buyer_persona_id
 * @property integer $informacion_relacional_id
 */
class PersonaBuyerPersona extends Model implements Recordable
{

    public $table = 'persona_buyer_persona';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;

    public $fillable = [
        'buyer_persona_id',
        'informacion_relacional_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'buyer_persona_id' => 'integer',
        'informacion_relacional_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'buyer_persona_id' => 'required|integer',
        'informacion_relacional_id' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function buyerPersona()
    {
        return $this->belongsTo(\App\Models\Contactos\BuyerPersona::class, 'buyer_persona_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function informacionRelacional()
    {
        return $this->belongsTo(\App\Models\Contactos\InformacionRelacional::class, 'informacion_relacional_id');
    }
}
