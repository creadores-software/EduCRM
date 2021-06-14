<?php

namespace App\Models\Parametros;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class Lugar
 * @package App\Models\Parametros
 * @version November 19, 2020, 10:52 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $contactos
 * @property \Illuminate\Database\Eloquent\Collection $entidads
 * @property string $nombre
 * @property string $tipo
 * @property integer $padre_id
 */
class Lugar extends Model implements Recordable
{

    public $table = 'lugar';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;

    public $fillable = [
        'nombre',
        'tipo',
        'padre_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'tipo' => 'string',
        'padre_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:255',
        'tipo' => 'required|string',
        'padre_id' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function lugarPadre()
    {
        return $this->belongsTo(\App\Models\Parametros\Lugar::class, 'padre_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contactos()
    {
        return $this->hasMany(\App\Models\Contactos\Contacto::class, 'lugar_residencia');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function entidads()
    {
        return $this->hasMany(\App\Models\Parametros\Entidad::class, 'lugar_id');
    }
}
