<?php

namespace App\Models\Parametros;

use Eloquent as Model;

/**
 * Class ActividadOcio
 * @package App\Models\Parametros
 * @version November 19, 2020, 10:51 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $preferenciaActividadOcios
 * @property string $nombre
 */
class ActividadOcio extends Model
{

    public $table = 'actividad_ocio';
    
    public $timestamps = false;




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
    public function preferenciaActividadOcios()
    {
        return $this->hasMany(\App\Models\Parametros\PreferenciaActividadOcio::class, 'actividad_ocio_id');
    }
}
