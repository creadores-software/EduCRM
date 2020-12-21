<?php

namespace App\Models\Contactos;

use Eloquent as Model;
use Altek\Accountant\Contracts\Recordable;
use App\Models\Contactos\InformacionRelacional;

/**
 * Class Contacto
 * @package App\Models\Contactos
 * @version December 1, 2020, 10:53 pm -05
 *
 * @property \App\Models\Contactos\Lugar $lugarResidencia
 * @property \App\Models\Contactos\EstadoCivil $estadoCivil
 * @property \App\Models\Contactos\Genero $genero
 * @property \App\Models\Contactos\InformacionRelacional $informacionRelacional
 * @property \App\Models\Contactos\Origen $origen
 * @property \App\Models\Contactos\Prefijo $prefijo
 * @property \App\Models\Contactos\TipoDocumento $tipoDocumento
 * @property \Illuminate\Database\Eloquent\Collection $contactoTipoContactos
 * @property \Illuminate\Database\Eloquent\Collection $informacionesAcademicas
 * @property \Illuminate\Database\Eloquent\Collection $informacionesEscolares
 * @property \Illuminate\Database\Eloquent\Collection $informacionesLaborales
 * @property \Illuminate\Database\Eloquent\Collection $parentescosDestino
 * @property \Illuminate\Database\Eloquent\Collection $parentescosOrigen
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
 * @property integer $informacion_relacional_id
 * @property integer $origen_id
 * @property integer $referido_por
 */
class Contacto extends Model implements Recordable
{

    public $table = 'contacto';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;
    //Para los eventos de BelongsToMany
    use \Altek\Eventually\Eventually;


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
        'observacion',
        'informacion_relacional_id',
        'origen_id',
        'referido_por'
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
        'observacion' => 'string',
        'informacion_relacional_id' => 'integer',
        'origen_id' => 'integer',
        'referido_por' => 'integer'
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
        'fecha_nacimiento' => 'nullable|before:today',
        'genero_id' => 'nullable|integer',
        'estado_civil_id' => 'nullable|integer',
        'celular' => 'required|string|max:15',
        'telefono' => 'nullable|string|max:15',
        'correo_personal' => 'required|string|email|max:200',
        'correo_institucional' => 'nullable|string|email|max:200',
        'lugar_residencia' => 'nullable|integer',
        'direccion_residencia' => 'nullable|string|max:200',
        'estrato' => 'nullable|integer',
        'activo' => 'nullable|boolean',
        'observacion' => 'nullable|string|max:255',
        'informacion_relacional_id' => 'nullable|integer',
        'origen_id' => 'required|integer',
        'referido_por' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function lugarResidencia()
    {
        return $this->belongsTo(\App\Models\Parametros\Lugar::class, 'lugar_residencia')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estadoCivil()
    {
        return $this->belongsTo(\App\Models\Parametros\EstadoCivil::class, 'estado_civil_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function genero()
    {
        return $this->belongsTo(\App\Models\Parametros\Genero::class, 'genero_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function informacionRelacional()
    {
        return $this->belongsTo(\App\Models\Contactos\InformacionRelacional::class, 'informacion_relacional_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function origen()
    {
        return $this->belongsTo(\App\Models\Parametros\Origen::class, 'origen_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function prefijo()
    {
        return $this->belongsTo(\App\Models\Parametros\Prefijo::class, 'prefijo_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipoDocumento()
    {
        return $this->belongsTo(\App\Models\Parametros\TipoDocumento::class, 'tipo_documento_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function referido()
    {
        return $this->belongsTo(\App\Models\Contactos\Contacto::class, 'referido_por');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tiposContacto()
    {
        return $this->belongsToMany(\App\Models\Parametros\TipoContacto::class, 'contacto_tipo_contacto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function informacionesAcademicas()
    {
        return $this->hasMany(\App\Models\Contactos\InformacionAcademica::class, 'contacto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function informacionesEscolares()
    {
        return $this->hasMany(\App\Models\Contactos\InformacionEscolar::class, 'contacto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function informacionesLaborales()
    {
        return $this->hasMany(\App\Models\Contactos\InformacionLaboral::class, 'contacto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function parentescosDestino()
    {
        return $this->hasMany(\App\Models\Parametros\Parentesco::class, 'contacto_destino');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function parentescosOrigen()
    {
        return $this->hasMany(\App\Models\Parametros\Parentesco::class, 'contacto_origen');
    }

    /**
     * Metodo para obtener nombre completo, es decir
     * Nombres concatenados con apellidos
     */
    public function getNombreCompleto(){
        return $this->nombres.' '.$this->apellidos;
    }

    /**
     * Se sobreescribe el método con el fin de crear el registro relacional
     * Posterior a la creación del registro de contacto
     */
    public function save(array $options = [])
    {
        parent::save($options);        
        try{
            if($this->informacion_relacional_id==null){
                $relacional = new InformacionRelacional;
                if($relacional->save()){
                    $this->informacion_relacional_id=$relacional->id;
                    $this->save();
                }
            }            
        }catch(\Exception $e){
            \Log::debug('Error al asociar la relación al contacto'.$e->getMessage());   // insert query
        }
    }

    /**
     * Se sobreescribe el método con el fin de eliminar el registro relacional
     * Posterior a la eliminación del registro de contacto
     */
    public function delete(array $options = [])
    {
        $id_relacional=$this->informacion_relacional_id;        
        parent::delete($options);        
        try{
            $modeloRelacional=InformacionRelacional::find($id_relacional);
            if(!empty($modeloRelacional)){
                $modeloRelacional->delete();
            }            
        }catch(\Exception $e){
            \Log::debug('Error al eliminar la información relación del contacto'.$e->getMessage());   // insert query
        }
    }
}
