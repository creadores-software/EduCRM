<?php

namespace App\Models\Parametros;

use Eloquent as Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class MedioComunicacion
 * @package App\Models\Parametros
 * @version November 19, 2020, 10:53 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $preferenciasMediosComunicacion
 * @property string $nombre
 */
class MedioComunicacion extends Model implements Auditable
{

    public $table = 'medio_comunicacion';
    
    public $timestamps = false;

    use \OwenIt\Auditing\Auditable;

    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:45'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function preferenciasMediosComunicacion()
    {
        return $this->hasMany(\App\Models\Parametros\PreferenciaMedioComunicacion::class, 'medio_comunicacion_id');
    }
}
