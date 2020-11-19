<?php

namespace App\Models\Parametros;

use Eloquent as Model;

/**
 * Class TipoDocumento
 * @package App\Models\Parametros
 * @version November 19, 2020, 10:53 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $contactos
 * @property string $nombre
 * @property string $abreviacion
 */
class TipoDocumento extends Model
{

    public $table = 'tipo_documento';
    
    public $timestamps = false;




    public $fillable = [
        'nombre',
        'abreviacion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'abreviacion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:45',
        'abreviacion' => 'required|string|max:2'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contactos()
    {
        return $this->hasMany(\App\Models\Parametros\Contacto::class, 'tipo_documento_id');
    }
}
