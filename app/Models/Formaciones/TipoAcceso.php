<?php

namespace App\Models\Formaciones;

use Eloquent as Model;

/**
 * Class TipoAcceso
 * @package App\Models\Formaciones
 * @version April 2, 2021, 4:18 pm -05
 *
 * @property \Illuminate\Database\Eloquent\Collection $informacionUniversitaria
 * @property string $nombre
 */
class TipoAcceso extends Model
{

    public $table = 'tipo_acceso';
    
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
    public function informacionUniversitaria()
    {
        return $this->hasMany(\App\Models\Formaciones\InformacionUniversitarium::class, 'tipo_acceso_id');
    }
}
