<?php

namespace App\Models\Formaciones;

use Eloquent as Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class NivelFormacion
 * @package App\Models\Formaciones
 * @version December 1, 2020, 9:41 pm -05
 *
 * @property \Illuminate\Database\Eloquent\Collection $formacions
 * @property \Illuminate\Database\Eloquent\Collection $informacionEscolars
 * @property \Illuminate\Database\Eloquent\Collection $informacionRelacionals
 * @property string $nombre
 * @property boolean $es_ies
 */
class NivelFormacion extends Model implements Auditable
{

    public $table = 'nivel_formacion';
    
    public $timestamps = false;

    use \OwenIt\Auditing\Auditable;


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
        'nombre' => 'required|string|max:100',
        'es_ies' => 'nullable|boolean'
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
