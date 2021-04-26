<?php

namespace App\Models\Campanias;

use Eloquent as Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class TipoInteraccionEstados
 * @package App\Models\Campanias
 * @version April 24, 2021, 5:55 pm -05
 *
 * @property \App\Models\Campanias\EstadoInteraccion $estadoInteraccion
 * @property \App\Models\Campanias\TipoInteraccion $tipoInteraccion
 * @property integer $tipo_interaccion_id
 * @property integer $estado_interaccion_id
 */
class TipoInteraccionEstados extends Model implements Recordable
{

    public $table = 'tipo_interaccion_estados';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




    public $fillable = [
        'tipo_interaccion_id',
        'estado_interaccion_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tipo_interaccion_id' => 'integer',
        'estado_interaccion_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tipo_interaccion_id' => 'required|integer',
        'estado_interaccion_id' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estadoInteraccion()
    {
        return $this->belongsTo(\App\Models\Campanias\EstadoInteraccion::class, 'estado_interaccion_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipoInteraccion()
    {
        return $this->belongsTo(\App\Models\Campanias\TipoInteraccion::class, 'tipo_interaccion_id')
            ->withDefault(['nombre' => '']);
    }
}
