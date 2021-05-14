<?php

namespace App\Models\Campanias;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class TipoCampaniaEstados
 * @package App\Models\Campanias
 * @version April 24, 2021, 2:04 pm -05
 *
 * @property \App\Models\Campanias\EstadoCampania $estadoCampania
 * @property \App\Models\Campanias\TipoCampania $tipoCampania
 * @property integer $tipo_campania_id
 * @property integer $estado_campania_id
 * @property integer $orden
 * @property integer $dias_cambio
 */
class TipoCampaniaEstados extends Model implements Recordable
{

    public $table = 'tipo_campania_estados';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




    public $fillable = [
        'tipo_campania_id',
        'estado_campania_id',
        'orden',
        'dias_cambio'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tipo_campania_id' => 'integer',
        'estado_campania_id' => 'integer',
        'orden' => 'integer',
        'dias_cambio' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tipo_campania_id' => 'required|integer',
        'estado_campania_id' => 'required|integer',
        'orden' => 'required|integer|min:1',
        'dias_cambio' => 'required|integer|min:0'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estadoCampania()
    {
        return $this->belongsTo(\App\Models\Campanias\EstadoCampania::class, 'estado_campania_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipoCampania()
    {
        return $this->belongsTo(\App\Models\Campanias\TipoCampania::class, 'tipo_campania_id')
            ->withDefault(['nombre' => '']);
    }
}
