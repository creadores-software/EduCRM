<?php

namespace App\Models\Formaciones;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class FacultadBuyerPersona
 * @package App\Models\Formaciones
 * @version April 2, 2021, 4:18 pm -05
 *
 * @property \App\Models\Formaciones\BuyerPersona $buyerPersona
 * @property \App\Models\Formaciones\Facultad $facultad
 * @property integer $facultad_id
 * @property integer $buyer_persona_id
 */
class FacultadBuyerPersona extends Model implements Recordable
{

    public $table = 'facultad_buyer_persona';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;

    public $fillable = [
        'facultad_id',
        'buyer_persona_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'facultad_id' => 'integer',
        'buyer_persona_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'facultad_id' => 'required|integer',
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
    public function facultad()
    {
        return $this->belongsTo(\App\Models\Formaciones\Facultad::class, 'facultad_id');
    }
}
