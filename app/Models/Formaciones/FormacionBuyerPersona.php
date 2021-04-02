<?php

namespace App\Models\Formaciones;

use Eloquent as Model;

/**
 * Class FormacionBuyerPersona
 * @package App\Models\Formaciones
 * @version April 2, 2021, 4:18 pm -05
 *
 * @property \App\Models\Formaciones\BuyerPersona $buyerPersona
 * @property \App\Models\Formaciones\Formacion $formacion
 * @property integer $formacion_id
 * @property integer $buyer_persona_id
 */
class FormacionBuyerPersona extends Model
{

    public $table = 'formacion_buyer_persona';
    
    public $timestamps = false;




    public $fillable = [
        'formacion_id',
        'buyer_persona_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'formacion_id' => 'integer',
        'buyer_persona_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'formacion_id' => 'required|integer',
        'buyer_persona_id' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function buyerPersona()
    {
        return $this->belongsTo(\App\Models\Formaciones\BuyerPersona::class, 'buyer_persona_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function formacion()
    {
        return $this->belongsTo(\App\Models\Formaciones\Formacion::class, 'formacion_id');
    }
}
