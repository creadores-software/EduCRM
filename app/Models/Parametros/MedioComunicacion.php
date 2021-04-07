<?php

namespace App\Models\Parametros;

use \Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class MedioComunicacion
 * @package App\Models\Parametros
 * @version April 4, 2021, 12:13 am -05
 *
 * @property \Illuminate\Database\Eloquent\Collection $preferenciaMedioComunicacions
 * @property string $nombre
 * @property boolean $es_red_social
 */
class MedioComunicacion extends Model implements Recordable
{

    public $table = 'medio_comunicacion';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




    public $fillable = [
        'nombre',
        'es_red_social'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'es_red_social' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:45',
        'es_red_social' => 'nullable|boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function preferenciaMedioComunicacions()
    {
        return $this->hasMany(\App\Models\Contactos\PreferenciaMedioComunicacion::class, 'medio_comunicacion_id');
    }
}
