<?php

namespace App\Models\Formaciones;

use Eloquent as Model;

/**
 * Class NivelFormacion
 * @package App\Models\Formaciones
 * @version November 19, 2020, 10:53 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $formacions
 * @property \Illuminate\Database\Eloquent\Collection $informacionEscolars
 * @property \Illuminate\Database\Eloquent\Collection $informacionRelacionals
 * @property string $nombre
 * @property integer $nivel_academico_id
 */
class NivelFormacion extends Model
{

    public $table = 'nivel_formacion';
    
    public $timestamps = false;




    public $fillable = [
        'nombre',
        'nivel_academico_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'nivel_academico_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:100',
        'nivel_academico_id' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function formacions()
    {
        return $this->hasMany(\App\Models\Formaciones\Formacion::class, 'nivel_formacion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function informacionEscolars()
    {
        return $this->hasMany(\App\Models\Formaciones\InformacionEscolar::class, 'nivel_educativo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function informacionRelacionals()
    {
        return $this->hasMany(\App\Models\Formaciones\InformacionRelacional::class, 'maximo_nivel_formacion_id');
    }
}
