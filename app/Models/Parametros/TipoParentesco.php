<?php

namespace App\Models\Parametros;

use Eloquent as Model;

/**
 * Class TipoParentesco
 * @package App\Models\Parametros
 * @version November 19, 2020, 10:54 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $parentescos
 * @property string $nombre
 * @property integer $tipo_contrario_id
 */
class TipoParentesco extends Model
{

    public $table = 'tipo_parentesco';
    
    public $timestamps = false;




    public $fillable = [
        'nombre',
        'tipo_contrario_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'tipo_contrario_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:100',
        'tipo_contrario_id' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function parentescos()
    {
        return $this->hasMany(\App\Models\Parametros\Parentesco::class, 'tipo_parentesco_id');
    }
}
