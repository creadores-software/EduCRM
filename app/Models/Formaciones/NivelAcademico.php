<?php

namespace App\Models\Formaciones;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class NivelAcademico
 * @package App\Models\Formaciones
 * @version April 2, 2021, 4:18 pm -05
 *
 * @property \Illuminate\Database\Eloquent\Collection $nivelformaciones
 * @property string $nombre
 * @property boolean $es_ies
 */
class NivelAcademico extends Model implements Recordable
{

    public $table = 'nivel_academico';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;

    public $fillable = [
        'nombre',
        'es_ies'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'es_ies' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:45',
        'es_ies' => 'nullable|boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function nivelformaciones()
    {
        return $this->hasMany(\App\Models\Formaciones\NivelFormacion::class, 'nivel_academico_id');
    }
}
