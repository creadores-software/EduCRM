<?php

namespace App\Models\Campanias;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class CampaniaFormaciones
 * @package App\Models\Campanias
 * @version April 24, 2021, 2:04 pm -05
 *
 * @property \App\Models\Campanias\Campania $campania
 * @property \App\Models\Campanias\Formacion $formacion
 * @property integer $campania_id
 * @property integer $formacion_id
 */
class CampaniaFormaciones extends Model implements Recordable
{

    public $table = 'campania_formaciones';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




    public $fillable = [
        'campania_id',
        'formacion_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'campania_id' => 'integer',
        'formacion_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'campania_id' => 'required|integer',
        'formacion_id' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function campania()
    {
        return $this->belongsTo(\App\Models\Campanias\Campania::class, 'campania_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function formacion()
    {
        return $this->belongsTo(\App\Models\Formaciones\Formacion::class, 'formacion_id')
            ->withDefault(['nombre' => '']);
    }
}
