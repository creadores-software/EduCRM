<?php

namespace App\Models\Contactos;

use Eloquent as Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Contacto
 * @package App\Models\Contactos
 * @version November 19, 2020, 10:51 pm UTC
 *
 * @property \App\Models\Contactos\Lugar $lugarResidencia
 * @property \App\Models\Contactos\EstadoCivil $estadoCivil
 * @property \App\Models\Contactos\Genero $genero
 * @property \App\Models\Contactos\Prefijo $prefijo
 * @property \App\Models\Contactos\TipoDocumento $tipoDocumento
 * @property \Illuminate\Database\Eloquent\Collection $contactoTipoContactos
 * @property \Illuminate\Database\Eloquent\Collection $informacionAcademicas
 * @property \Illuminate\Database\Eloquent\Collection $informacionEscolars
 * @property \Illuminate\Database\Eloquent\Collection $informacionLaborals
 * @property \Illuminate\Database\Eloquent\Collection $informacionRelacionals
 * @property \Illuminate\Database\Eloquent\Collection $informacionRelacional1s
 * @property \Illuminate\Database\Eloquent\Collection $parentescos
 * @property \Illuminate\Database\Eloquent\Collection $parentesco2s
 * @property integer $tipo_documento_id
 * @property string $identificacion
 * @property integer $prefijo_id
 * @property string $nombres
 * @property string $apellidos
 * @property string $fecha_nacimiento
 * @property integer $genero_id
 * @property integer $estado_civil_id
 * @property string $celular
 * @property string $telefono
 * @property string $correo_personal
 * @property string $correo_institucional
 * @property integer $lugar_residencia
 * @property string $direccion_residencia
 * @property integer $estrato
 * @property boolean $activo
 * @property string $observacion
 */
class Contacto extends Model implements Auditable
{

    public $table = 'contacto';
    
    public $timestamps = false;

    use \OwenIt\Auditing\Auditable;

    public $fillable = [
        'tipo_documento_id',
        'identificacion',
        'prefijo_id',
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'genero_id',
        'estado_civil_id',
        'celular',
        'telefono',
        'correo_personal',
        'correo_institucional',
        'lugar_residencia',
        'direccion_residencia',
        'estrato',
        'activo',
        'observacion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tipo_documento_id' => 'integer',
        'identificacion' => 'string',
        'prefijo_id' => 'integer',
        'nombres' => 'string',
        'apellidos' => 'string',
        'fecha_nacimiento' => 'date',
        'genero_id' => 'integer',
        'estado_civil_id' => 'integer',
        'celular' => 'string',
        'telefono' => 'string',
        'correo_personal' => 'string',
        'correo_institucional' => 'string',
        'lugar_residencia' => 'integer',
        'direccion_residencia' => 'string',
        'estrato' => 'integer',
        'activo' => 'boolean',
        'observacion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tipo_documento_id' => 'nullable|integer',
        'identificacion' => 'nullable|string|max:30',
        'prefijo_id' => 'nullable|integer',
        'nombres' => 'required|string|max:200',
        'apellidos' => 'required|string|max:200',
        'fecha_nacimiento' => 'nullable',
        'genero_id' => 'nullable|integer',
        'estado_civil_id' => 'nullable|integer',
        'celular' => 'required|string|max:15',
        'telefono' => 'nullable|string|max:15',
        'correo_personal' => 'required|string|max:200',
        'correo_institucional' => 'nullable|string|max:200',
        'lugar_residencia' => 'nullable|integer',
        'direccion_residencia' => 'nullable|string|max:200',
        'estrato' => 'nullable|integer',
        'activo' => 'nullable|boolean',
        'observacion' => 'nullable|string|max:255'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function lugarResidencia()
    {
        return $this->belongsTo(\App\Models\Contactos\Lugar::class, 'lugar_residencia');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estadoCivil()
    {
        return $this->belongsTo(\App\Models\Contactos\EstadoCivil::class, 'estado_civil_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function genero()
    {
        return $this->belongsTo(\App\Models\Contactos\Genero::class, 'genero_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function prefijo()
    {
        return $this->belongsTo(\App\Models\Contactos\Prefijo::class, 'prefijo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipoDocumento()
    {
        return $this->belongsTo(\App\Models\Contactos\TipoDocumento::class, 'tipo_documento_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contactoTipoContactos()
    {
        return $this->hasMany(\App\Models\Contactos\ContactoTipoContacto::class, 'contacto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function informacionAcademicas()
    {
        return $this->hasMany(\App\Models\Contactos\InformacionAcademica::class, 'contacto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function informacionEscolars()
    {
        return $this->hasMany(\App\Models\Contactos\InformacionEscolar::class, 'contacto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function informacionLaborals()
    {
        return $this->hasMany(\App\Models\Contactos\InformacionLaboral::class, 'contacto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function informacionRelacionals()
    {
        return $this->hasMany(\App\Models\Contactos\InformacionRelacional::class, 'contacto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function informacionRelacional1s()
    {
        return $this->hasMany(\App\Models\Contactos\InformacionRelacional::class, 'referido_por_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function parentescos()
    {
        return $this->hasMany(\App\Models\Contactos\Parentesco::class, 'contacto_destino');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function parentesco2s()
    {
        return $this->hasMany(\App\Models\Contactos\Parentesco::class, 'contacto_origen');
    }
}
