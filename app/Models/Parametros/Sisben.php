<?php

namespace App\Models\Parametros;

use Eloquent as Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class Sisben
 * @package App\Models\Parametros
 * @version April 24, 2021, 2:04 pm -05
 *
 * @property \Illuminate\Database\Eloquent\Collection $contactos
 * @property string $nombre
 */
class Sisben extends Model implements Recordable
{

    public $table = 'sisben';
    use \Altek\Accountant\Recordable;
    
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
        'nombre' => 'nullable|string|max:45'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contactos()
    {
        return $this->hasMany(\App\Models\Contactos\Contacto::class, 'sisben_id');
    }
}
