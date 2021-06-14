<?php

namespace App\Models\Formaciones;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class PeriodoAcademico
 * @package App\Models\Formaciones
 * @version April 24, 2021, 2:04 pm -05
 *
 * @property \Illuminate\Database\Eloquent\Collection $campania
 * @property \Illuminate\Database\Eloquent\Collection $informacionUniversitaria
 * @property \Illuminate\Database\Eloquent\Collection $informacionUniversitarium1s
 * @property string $nombre
 * @property string $fecha_inicio
 * @property string $fecha_fin
 */
class PeriodoAcademico extends Model implements Recordable
{

    public $table = 'periodo_academico';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




    public $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'fecha_inicio' => 'date:Y-m-d',
        'fecha_fin' => 'date:Y-m-d'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:45',
        'fecha_inicio' => 'nullable',
        'fecha_fin' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function campania()
    {
        return $this->hasMany(\App\Models\Formaciones\Campania::class, 'periodo_academico_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function informacionUniversitaria()
    {
        return $this->hasMany(\App\Models\Formaciones\InformacionUniversitarium::class, 'periodo_academico_final');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function informacionUniversitarium1s()
    {
        return $this->hasMany(\App\Models\Formaciones\InformacionUniversitarium::class, 'periodo_academico_inicial');
    }
}
