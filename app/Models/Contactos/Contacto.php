<?php

namespace App\Models\Contactos;

use Eloquent as Model;
use Altek\Accountant\Contracts\Recordable;
use App\Models\Contactos\InformacionRelacional;
use Illuminate\Support\Facades\DB;

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
 * @property string $otro_origen
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
        'referido_por',
        'otro_origen'
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
        'referido_por' => 'integer',
        'otro_origen' => 'string'
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
        'referido_por' => 'nullable|integer',
        'otro_origen' => 'nullable|string|max:45'
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
                //Por defecto se establece que si autoriza comunicación
                $relacional->autoriza_comunicacion=1;
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

    public static function inputsDataTable(){
        return "data.nombres  = $('#nombres').val();
        data.apellidos  = $('#apellidos').val();                    
        data.correo_personal  = $('#correo_personal').val();
        data.correo_institucional  = $('#correo_institucional').val();
        data.celular  = $('#celular').val();
        data.telefono  = $('#telefono').val();
        data.otro_origen  = $('#otro_origen').val();
        data.direccion_residencia  = $('#direccion_residencia').val();
        data.observacion  = $('#observacion').val();

        data.origenes  = $('#origenes').val();
        data.referidos  = $('#referidos').val();
        data.estratos  = $('#estratos').val();
        data.tipos_documento  = $('#tipos_documento').val();
        data.generos  = $('#generos').val();
        data.prefijos  = $('#prefijos').val();
        data.estados_civiles  = $('#estados_civiles').val();
        data.tiposContacto  = $('#tiposContacto').val();
        data.lugares_residencia  = $('#lugares_residencia').val();
        data.activo  = $('#activo').val();

        data.fecha_nacimiento  = $('#fecha_nacimiento').val();
        data.cumple  = $('#cumple').val();                    
        data.edad_minima  = $('#edad_minima').val();
        data.edad_maxima  = $('#edad_maxima').val();";
    }

    public static function filtroDataTable($request, $query){
        if($request->has('nombres') && $request->get('nombres')){
            $texto='%'.strtoupper($request->get('nombres')).'%';
            $query->where(DB::raw('upper(contacto.nombres)'), 'LIKE', $texto);                        
        }
        if($request->has('apellidos') && $request->get('apellidos')){
            $texto='%'.strtoupper($request->get('apellidos')).'%';
            $query->where(DB::raw('upper(contacto.apellidos)'), 'LIKE', $texto);                        
        }
        if($request->has('correo_personal') && $request->get('correo_personal')){
            $texto='%'.strtoupper($request->get('correo_personal')).'%';
            $query->where(DB::raw('upper(contacto.correo_personal)'), 'LIKE', $texto);                        
        }
        if($request->has('correo_institucional') && $request->get('correo_institucional')){
            $texto='%'.strtoupper($request->get('correo_institucional')).'%';
            $query->where(DB::raw('upper(contacto.correo_institucional)'), 'LIKE', $texto);                        
        }
        if($request->has('celular') && $request->get('celular')){
            $texto='%'.strtoupper($request->get('celular')).'%';
            $query->where(DB::raw('upper(contacto.celular)'), 'LIKE', $texto);                        
        }
        if($request->has('telefono') && $request->get('telefono')){
            $texto='%'.strtoupper($request->get('telefono')).'%';
            $query->where(DB::raw('upper(contacto.telefono)'), 'LIKE', $texto);                        
        }
        if($request->has('otro_origen') && $request->get('otro_origen')){
            $texto='%'.strtoupper($request->get('otro_origen')).'%';
            $query->where(DB::raw('upper(contacto.otro_origen)'), 'LIKE', $texto);                        
        }
        if($request->has('direccion_residencia') && $request->get('direccion_residencia')){
            $texto='%'.strtoupper($request->get('direccion_residencia')).'%';
            $query->where(DB::raw('upper(contacto.direccion_residencia)'), 'LIKE', $texto);                        
        }
        if($request->has('observacion') && $request->get('observacion')){
            $texto='%'.strtoupper($request->get('observacion')).'%';
            $query->where(DB::raw('upper(contacto.observacion)'), 'LIKE', $texto);                        
        }
        if($request->has('origenes') && $request->get('origenes')){
            $query->whereIn("origen.id",$request->get('origenes'));
        }
        if($request->has('referidos') && $request->get('referidos')){
            $query->whereIn("contacto.referido_por",$request->get('referidos'));
        }
        if($request->has('estratos') && $request->get('estratos')){
            $query->whereIn("contacto.estrato",$request->get('estratos'));
        }
        if($request->has('tipos_documento') && $request->get('tipos_documento')){
            $query->whereIn("tipoDocumento.id",$request->get('tipo_documento_id'));
        }
        if($request->has('generos') && $request->get('generos')){
            $query->whereIn("genero.id",$request->get('generos'));
        }
        if($request->has('prefijos') && $request->get('prefijos')){
            $query->whereIn("prefijo.id",$request->get('prefijos'));
        }
        if($request->has('estados_civiles') && $request->get('estados_civiles')){
            $query->whereIn("estadoCivil.id",$request->get('estados_civiles'));
        }
        if($request->has('tiposContacto') && $request->get('tiposContacto')){
            $query->whereIn("tipoContacto.id",$request->get('tiposContacto'));
        }
        if($request->has('lugares_residencia') && $request->get('lugares_residencia')){
            $query->whereIn("lugarResidencia.id",$request->get('lugares_residencia'));
        }
        if($request->has('activo') && $request->get('activo')!=''){
            $query->whereRaw("activo = ?", $request->get('activo'));
        }

        if($request->has('fecha_nacimiento') && $request->get('fecha_nacimiento')){
            $query->where("fecha_nacimiento",  $request->get('fecha_nacimiento'));
        }
        //0 es cualquier fecha
        if($request->has('cumple') && $request->get('cumple')!=0){
            switch ($request->get('cumple')) {
                //Ayer
                case 1:                                
                    break;
                //Hoy
                case 2:
                    $query->whereRaw("DATE_FORMAT(fecha_nacimiento,'%m-%d') = DATE_FORMAT(NOW(),'%m-%d')");
                    break;
                //Mañana
                case 3:
                    break;
                //Esta semana
                case 4:
                    //https://stackoverflow.com/questions/42934915/mysql-get-birthdays-from-current-week
                    $query->whereRaw("DATE(fecha_nacimiento + INTERVAL (YEAR(NOW()) - YEAR(fecha_nacimiento)) YEAR)
                    BETWEEN DATE(NOW() - INTERVAL WEEKDAY(NOW()) DAY)
                    AND DATE(NOW() + INTERVAL 6 - WEEKDAY(NOW()) DAY)");
                    break;
                //Este mes
                case 5:
                    $query->whereRaw("MONTH(fecha_nacimiento) = MONTH(NOW())");
                    break;
            }
        }
        if($request->has('edad_minima') && $request->get('edad_minima')){
            $query->whereRaw("fecha_nacimiento is not null and  TIMESTAMPDIFF( YEAR, fecha_nacimiento, now()) >= ?",[$request->get('edad_minima')]);
        }
        if($request->has('edad_maxima') && $request->get('edad_maxima')){
            $query->whereRaw("fecha_nacimiento is not null and  TIMESTAMPDIFF( YEAR, fecha_nacimiento, now()) <= ?",[$request->get('edad_maxima')]);
        }
    }
}
