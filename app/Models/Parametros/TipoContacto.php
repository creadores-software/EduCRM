<?php

namespace App\Models\Parametros;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class TipoContacto
 * @package App\Models\Parametros
 * @version November 19, 2020, 10:53 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $contactoTipoContactos
 * @property string $nombre
 */
class TipoContacto extends Model implements Recordable
{

    public $table = 'tipo_contacto';
    
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
    public function contactoTipoContactos()
    {
        return $this->hasMany(\App\Models\Parametros\ContactoTipoContacto::class, 'tipo_contacto_id');
    }
}
