<?php

namespace App\Models\Contactos;

use Illuminate\Database\Eloquent\Model;
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
 * @property \Illuminate\Database\Eloquent\Collection $informacionesUniversitarias
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
 * @property string $barrio
 * @property integer $estrato
 * @property integer $sisben_id
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
        'barrio',
        'estrato',
        'sisben_id',
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
        'barrio' => 'string',
        'estrato' => 'integer',
        'sisben_id' => 'integer',
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
        'barrio' => 'nullable|string|max:150',
        'estrato' => 'nullable|integer|max:6|min:1',
        'sisben_id' => 'nullable|integer',
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
    public function sisben()
    {
        return $this->belongsTo(\App\Models\Parametros\Sisben::class, 'sisben_id')
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
    public function informacionesUniversitarias()
    {
        return $this->hasMany(\App\Models\Contactos\InformacionUniversitaria::class, 'contacto_id');
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

    /**
     * Define los join que deben ir en el query del datatable
     */
    public static function joinDataTable($model){
        return $model
            ->leftjoin('lugar as lugarResidencia', 'contacto.lugar_residencia', '=', 'lugarResidencia.id')
            ->leftjoin('estado_civil as estadoCivil', 'contacto.estado_civil_id', '=', 'estadoCivil.id')
            ->leftjoin('genero', 'contacto.genero_id', '=', 'genero.id')
            ->leftjoin('origen', 'contacto.origen_id', '=', 'origen.id')
            ->leftjoin('prefijo', 'contacto.prefijo_id', '=', 'prefijo.id')
            ->leftjoin('sisben', 'contacto.sisben_id', '=', 'sisben.id')
            ->leftjoin('tipo_documento as tipoDocumento', 'contacto.tipo_documento_id', '=', 'tipoDocumento.id')
            ->leftjoin('contacto_tipo_contacto as tipoContacto', 'tipoContacto.contacto_id', '=', 'contacto.id');            
    }

    /**
     * Define los select que deben ir en el query del datatable
     */
    public static function selectDataTable(){
        return 
        ['contacto.id','tipoDocumento.nombre as nombre_tipo_documento','contacto.identificacion',
        'prefijo.nombre as nombre_prefijo','contacto.nombres','contacto.apellidos','contacto.fecha_nacimiento',
        'genero.nombre as nombre_genero','estadoCivil.nombre as nombre_estado_civil','contacto.celular','contacto.telefono',
        'contacto.correo_personal','contacto.correo_institucional','lugarResidencia.nombre as nombre_lugar',
        'contacto.direccion_residencia','contacto.barrio','contacto.estrato','contacto.activo','contacto.observacion',
        'origen.nombre as nombre_origen','contacto.referido_por','contacto.otro_origen','sisben.nombre as nombre_sisben'];
    }

    /**
     * Establece la obtención de los valores en los inputs de la vista de segmento
     */
    public static function inputsDataTable(){
        $dt_atributos = [
            'nombres',
            'apellidos',
            'correo_personal',
            'correo_institucional',
            'identificacion',
            'celular',
            'telefono',
            'otro_origen',
            'direccion_residencia',
            'barrio',
            'observacion',
            'origenes',
            'referidos',
            'estratos',
            'sisbenes_elegidos',
            'tipos_documento',
            'generos',
            'prefijos',
            'estados_civiles',
            'tiposContacto',
            'lugares_residencia',
            'activo',
            'fecha_nacimiento',
            'cumple',                   
            'edad_minima',
            'edad_maxima'
        ];
        $inputs="";
        foreach($dt_atributos as $atributo){
            $inputs.="data.{$atributo}  = $('#{$atributo}').val();";   
        }
        return $inputs;
    }

    /**
     * Filtra el query de acuerdo a los atributos enviados, relacionados con la entidad contacto
     */
    public static function filtroDataTable($valores, $query){
        $dt_atributos_like=[
            'nombres'=>'contacto.nombres',
            'apellidos'=>'contacto.apellidos',
            'correo_personal'=>'contacto.correo_personal',
            'correo_institucional'=>'contacto.correo_institucional',
            'celular'=>'contacto.celular',
            'telefono'=>'contacto.telefono',
            'otro_origen'=>'contacto.otro_origen',
            'direccion_residencia'=>'contacto.direccion_residencia',
            'barrio'=>'contacto.barrio',
            'identificacion'=>'contacto.identificacion'              
        ];
        foreach($dt_atributos_like as $atributo => $enTabla){
            if(array_key_exists($atributo, $valores) && !empty($valores[$atributo])){
                $texto='%'.strtoupper($valores[$atributo]).'%';
                $query->where(DB::raw("upper({$enTabla})"), 'LIKE', $texto);                        
            }
        }
        $dt_atributos_in=[
            'origenes'=>'origen.id',
            'referidos'=>'contacto.referido_por',
            'estratos'=>'contacto.estrato',
            'sisbenes_elegidos'=>'sisben.id',
            'tipos_documento'=>'tipoDocumento.id',
            'generos'=>'genero.id',
            'prefijos'=>'prefijo.id',
            'estados_civiles'=>'estadoCivil.id',
            'tiposContacto'=>'tipoContacto.tipo_contacto_id',
            'lugares_residencia'=>'lugarResidencia.id',
        ];
        foreach($dt_atributos_in as $atributo => $enTabla){
            if(array_key_exists($atributo, $valores) 
            && is_array($valores[$atributo]) &&
            !empty($valores[$atributo])){
                $query->whereIn($enTabla,$valores[$atributo]);
            }
        }

        //Otras validaciones específicas

        if(array_key_exists('activo', $valores) && $valores['activo']!=''){
            //No se revisa solo con empty pues el valor 0 en activo implica no
            $query->where("activo", $valores['activo']);
        }

        if(array_key_exists('fecha_nacimiento', $valores) && !empty($valores['fecha_nacimiento'])){
            $query->where("fecha_nacimiento",  $valores['fecha_nacimiento']);
        }
       
        if(array_key_exists('cumple', $valores) && $valores['cumple']!=0){ //0 es cualquier fecha
            switch ($valores['cumple']) {                
                case 1: //Ayer
                    $query->whereRaw("DATE_FORMAT(fecha_nacimiento,'%m-%d') = DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%m-%d')");                              
                    break;               
                case 2: //Hoy
                    $query->whereRaw("DATE_FORMAT(fecha_nacimiento,'%m-%d') = DATE_FORMAT(NOW(),'%m-%d')");
                    break;                
                case 3: //Mañana
                    $query->whereRaw("DATE_FORMAT(fecha_nacimiento,'%m-%d') = DATE_FORMAT(DATE_ADD(CURDATE(), INTERVAL 1 DAY),'%m-%d')");
                    break;                
                case 4: //Esta semana 
                    $query->whereRaw(
                        "DATE(fecha_nacimiento + INTERVAL (YEAR(NOW()) - YEAR(fecha_nacimiento)) YEAR)
                        BETWEEN DATE(NOW() - INTERVAL WEEKDAY(NOW()) DAY)
                        AND DATE(NOW() + INTERVAL 6 - WEEKDAY(NOW()) DAY)"
                    );
                    break;               
                case 5: //Este mes
                    $query->whereRaw("MONTH(fecha_nacimiento) = MONTH(NOW())");
                    break;
            }
        }
        if(array_key_exists('edad_minima', $valores) && !empty($valores['edad_minima'])){
            $query->whereRaw("fecha_nacimiento is not null and  TIMESTAMPDIFF( YEAR, fecha_nacimiento, now()) >= ?",[$valores['edad_minima']]);
        }
        if(array_key_exists('edad_maxima', $valores) && !empty($valores['edad_maxima'])){
            $query->whereRaw("fecha_nacimiento is not null and  TIMESTAMPDIFF( YEAR, fecha_nacimiento, now()) <= ?",[$valores['edad_maxima']]);
        }
    }    
}
