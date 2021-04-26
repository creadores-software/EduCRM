<?php

namespace App\Models\Campanias;

use Eloquent as Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class TipoInteraccion
 * @package App\Models\Campanias
 * @version April 24, 2021, 2:04 pm -05
 *
 * @property \Illuminate\Database\Eloquent\Collection $interaccions
 * @property \Illuminate\Database\Eloquent\Collection $tipoInteraccionEstados
 * @property string $nombre
 * @property boolean $con_fecha_fin
 */
class TipoInteraccion extends Model implements Recordable
{

    public $table = 'tipo_interaccion';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




    public $fillable = [
        'nombre',
        'con_fecha_fin'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'con_fecha_fin' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:45',
        'con_fecha_fin' => 'nullable|boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function interacciones()
    {
        return $this->hasMany(\App\Models\Campanias\Interaccion::class, 'tipo_interaccion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tipoInteraccionEstados()
    {
        return $this->hasMany(\App\Models\Campanias\TipoInteraccionEstados::class, 'tipo_interaccion_id');
    }
}
