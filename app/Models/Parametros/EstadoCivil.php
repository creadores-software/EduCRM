<?php

namespace App\Models\Parametros;

use \Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class EstadoCivil
 * @package App\Models\Parametros
 * @version November 19, 2020, 10:52 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $contactos
 * @property string $nombre
 */
class EstadoCivil extends Model implements Recordable
{

    public $table = 'estado_civil';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;

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
    public function contactos()
    {
        return $this->hasMany(\App\Models\Parametros\Contacto::class, 'estado_civil_id');
    }
}
