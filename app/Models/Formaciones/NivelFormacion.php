<?php

namespace App\Models\Formaciones;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class NivelFormacion
 * @package App\Models\Formaciones
 * @version April 3, 2021, 11:47 pm -05
 *
 * @property \App\Models\Formaciones\NivelAcademico $nivelAcademico
 * @property \Illuminate\Database\Eloquent\Collection $formaciones
 * @property \Illuminate\Database\Eloquent\Collection $informacionEscolars
 * @property \Illuminate\Database\Eloquent\Collection $informacionRelacionals
 * @property string $nombre
 * @property integer $nivel_academico_id
 */
class NivelFormacion extends Model implements Recordable
{

    public $table = 'nivel_formacion';
    use \Altek\Accountant\Recordable;
    
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function nivelAcademico()
    {
        return $this->belongsTo(\App\Models\Formaciones\NivelAcademico::class, 'nivel_academico_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function formaciones()
    {
        return $this->hasMany(\App\Models\Formaciones\Formacion::class, 'nivel_formacion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function informacionEscolars()
    {
        return $this->hasMany(\App\Models\Formaciones\InformacionEscolar::class, 'nivel_formacion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function informacionRelacionals()
    {
        return $this->hasMany(\App\Models\Formaciones\InformacionRelacional::class, 'maximo_nivel_formacion_id');
    }
}
