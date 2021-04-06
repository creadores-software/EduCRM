<?php

namespace App\Models\Formaciones;

use Eloquent as Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class Formacion
 * @package App\Models\Formaciones
 * @version April 4, 2021, 1:08 pm -05
 *
 * @property \App\Models\Formaciones\Entidad $entidad
 * @property \App\Models\Formaciones\Facultad $facultad
 * @property \App\Models\Formaciones\Modalidad $modalidad
 * @property \App\Models\Formaciones\Periodicidad $periodicidad
 * @property \App\Models\Formaciones\Reconocimiento $reconocimiento
 * @property \App\Models\Formaciones\CampoEducacion $campoEducacion
 * @property \App\Models\Formaciones\NivelFormacion $nivelFormacion
 * @property \Illuminate\Database\Eloquent\Collection $formacionBuyerPersonas
 * @property \Illuminate\Database\Eloquent\Collection $informacionUniversitaria
 * @property \Illuminate\Database\Eloquent\Collection $preferenciaFormacions
 * @property string $nombre
 * @property integer $entidad_id
 * @property integer $nivel_formacion_id
 * @property integer $codigo_snies
 * @property string $titulo_otorgado
 * @property integer $campo_educacion_id
 * @property integer $modalidad_id
 * @property integer $periodicidad_id
 * @property integer $periodos_duracion
 * @property integer $reconocimiento_id
 * @property number $costo_matricula
 * @property boolean $activo
 * @property integer $facultad_id
 */
class Formacion extends Model implements Recordable
{

    public $table = 'formacion';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




    public $fillable = [
        'nombre',
        'entidad_id',
        'nivel_formacion_id',
        'codigo_snies',
        'titulo_otorgado',
        'campo_educacion_id',
        'modalidad_id',
        'periodicidad_id',
        'periodos_duracion',
        'reconocimiento_id',
        'costo_matricula',
        'activo',
        'facultad_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'entidad_id' => 'integer',
        'nivel_formacion_id' => 'integer',
        'codigo_snies' => 'integer',
        'titulo_otorgado' => 'string',
        'campo_educacion_id' => 'integer',
        'modalidad_id' => 'integer',
        'periodicidad_id' => 'integer',
        'periodos_duracion' => 'integer',
        'reconocimiento_id' => 'integer',
        'costo_matricula' => 'float',
        'activo' => 'boolean',
        'facultad_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:150',
        'entidad_id' => 'required|integer',
        'nivel_formacion_id' => 'required|integer',
        'codigo_snies' => 'nullable|integer',
        'titulo_otorgado' => 'nullable|string|max:150',
        'campo_educacion_id' => 'nullable|integer',
        'modalidad_id' => 'nullable|integer',
        'periodicidad_id' => 'nullable|integer',
        'periodos_duracion' => 'nullable|integer',
        'reconocimiento_id' => 'nullable|integer',
        'costo_matricula' => 'nullable|numeric',
        'activo' => 'nullable|boolean',
        'facultad_id' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function entidad()
    {
        return $this->belongsTo(\App\Models\Entidades\Entidad::class, 'entidad_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function facultad()
    {
        return $this->belongsTo(\App\Models\Formaciones\Facultad::class, 'facultad_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function modalidad()
    {
        return $this->belongsTo(\App\Models\Formaciones\Modalidad::class, 'modalidad_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function periodicidad()
    {
        return $this->belongsTo(\App\Models\Formaciones\Periodicidad::class, 'periodicidad_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function reconocimiento()
    {
        return $this->belongsTo(\App\Models\Formaciones\Reconocimiento::class, 'reconocimiento_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function campoEducacion()
    {
        return $this->belongsTo(\App\Models\Formaciones\CampoEducacion::class, 'campo_educacion_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function nivelFormacion()
    {
        return $this->belongsTo(\App\Models\Formaciones\NivelFormacion::class, 'nivel_formacion_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function formacionBuyerPersonas()
    {
        return $this->hasMany(\App\Models\Formaciones\FormacionBuyerPersona::class, 'formacion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function informacionesUniversitarias()
    {
        return $this->hasMany(\App\Models\Contactos\InformacionUniversitaria::class, 'formacion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function preferenciaFormacions()
    {
        return $this->hasMany(\App\Models\Contactos\PreferenciaFormacion::class, 'formacion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function perfilesBuyersPersona()
    {
        return $this->belongsToMany(\App\Models\Parametros\BuyerPersona::class, 'formacion_buyer_persona');
    }
}
