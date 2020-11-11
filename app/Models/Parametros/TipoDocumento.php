<?php

namespace App\Models\Parametros;

use Eloquent as Model;

/**
 * Class TipoDocumento
 * @package App\Models\Parametros
 * @version November 11, 2020, 4:13 am UTC
 *
 * @property string $nombre
 * @property string $abreviacion
 */
class TipoDocumento extends Model
{

    public $table = 'tipo_documento';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




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
        'abreviacion' => 'required|string|max:2',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
