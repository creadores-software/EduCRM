<?php

namespace App\Models\Campanias;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class TipoInteraccion
 * @package App\Models\Campanias
 * @version April 24, 2021, 2:04 pm -05
 *
 * @property \Illuminate\Database\Eloquent\Collection $interaccions
 * @property \Illuminate\Database\Eloquent\Collection $tipoInteraccionEstados
 * @property string $nombre
 */
class TipoInteraccion extends Model implements Recordable
{

    public $table = 'tipo_interaccion';
    use \Altek\Accountant\Recordable;
     //Para los eventos de BelongsToMany
     use \Altek\Eventually\Eventually;
    
    public $timestamps = false;




    public $fillable = [
        'nombre',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:45',
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
        return $this->belongsToMany(\App\Models\Campanias\EstadoInteraccion::class, 'tipo_interaccion_estados');
    }
}
