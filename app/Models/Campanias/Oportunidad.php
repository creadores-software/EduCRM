<?php

namespace App\Models\Campanias;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;
use Illuminate\Support\Facades\Auth;

/**
 * Class Oportunidad
 * @package App\Models\Campanias
 * @version April 24, 2021, 2:04 pm -05
 *
 * @property \App\Models\Campanias\Campania $campania
 * @property \App\Models\Campanias\Contacto $contacto
 * @property \App\Models\Campanias\EstadoCampania $estadoCampania
 * @property \App\Models\Campanias\Formacion $formacion
 * @property \App\Models\Campanias\JustificacionEstadoCampania $justificacionEstadoCampania
 * @property \Illuminate\Database\Eloquent\Collection $interaccions
 * @property integer $campania_id
 * @property integer $contacto_id
 * @property integer $formacion_id
 * @property integer $responsable_id
 * @property integer $estado_campania_id
 * @property integer $justificacion_estado_campania_id
 * @property integer $interes
 * @property integer $capacidad
 * @property integer $categoria_oportunidad_id
 * @property number $ingreso_recibido
 * @property number $ingreso_proyectado
 * @property boolean $adicion_manual
 * @property string|\Carbon\Carbon $ultima_actualizacion
 * @property string|\Carbon\Carbon $ultima_interaccion
 */
class Oportunidad extends Model implements Recordable
{

    public $table = 'oportunidad';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




    public $fillable = [
        'campania_id',
        'contacto_id',
        'formacion_id',
        'responsable_id',
        'estado_campania_id',
        'justificacion_estado_campania_id',
        'interes',
        'capacidad',
        'categoria_oportunidad_id',
        'ingreso_recibido',
        'ingreso_proyectado',
        'adicion_manual',
        'ultima_actualizacion',
        'ultima_interaccion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'campania_id' => 'integer',
        'contacto_id' => 'integer',
        'formacion_id' => 'integer',
        'responsable_id' => 'integer',
        'estado_campania_id' => 'integer',
        'justificacion_estado_campania_id' => 'integer',
        'interes' => 'integer',
        'capacidad' => 'integer',
        'categoria_oportunidad_id' => 'integer',
        'ingreso_recibido' => 'float',
        'ingreso_proyectado' => 'float',
        'adicion_manual' => 'boolean',
        'ultima_actualizacion' => 'datetime',
        'ultima_interaccion' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'campania_id' => 'required|integer',
        'contacto_id' => 'required|integer',
        'formacion_id' => 'nullable|integer',
        'responsable_id' => 'nullable|integer',
        'estado_campania_id' => 'required|integer',
        'justificacion_estado_campania_id' => 'required|integer',
        'interes' => 'nullable|integer|min:1|max:5',
        'capacidad' => 'nullable|integer|min:1|max:5',
        'categoria_oportunidad_id' => 'nullable|integer',
        'ingreso_recibido' => 'nullable|numeric|min:0',
        'ingreso_proyectado' => 'nullable|numeric|min:0',
        'adicion_manual' => 'nullable|boolean',
        'ultima_actualizacion' => 'nullable',
        'ultima_interaccion' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function categoriaOportunidad()
    {
        return $this->belongsTo(\App\Models\Campanias\CategoriaOportunidad::class, 'categoria_oportunidad_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function campania()
    {
        return $this->belongsTo(\App\Models\Campanias\Campania::class, 'campania_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function contacto()
    {
        return $this->belongsTo(\App\Models\Contactos\Contacto::class, 'contacto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estadoCampania()
    {
        return $this->belongsTo(\App\Models\Campanias\EstadoCampania::class, 'estado_campania_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function formacion()
    {
        return $this->belongsTo(\App\Models\Formaciones\Formacion::class, 'formacion_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function justificacionEstadoCampania()
    {
        return $this->belongsTo(\App\Models\Campanias\JustificacionEstadoCampania::class, 'justificacion_estado_campania_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function responsable()
    {
        return $this->belongsTo(\App\Models\Admin\User::class, 'responsable_id')
            ->withDefault(['name' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function interacciones()
    {
        return $this->hasMany(\App\Models\Campanias\Interaccion::class, 'oportunidad_id');
    }

    public static function oportunidadesAutorizadas($campania_id){
        $ids=[];
        $campania=Campania::where('id',$campania_id)->first();
        $usuario=Auth::user();
        if(!empty($campania)){
            if(Campania::tieneAutorizacionGeneral($campania->id)){                
                $ids=['todo'];
            }else{
                $misOportunidades=Oportunidad::
                    where('responsable_id',$usuario->id)
                    ->where('campania_id',$campania->id)->get();
                foreach($misOportunidades as $oportunidad){
                    $ids[]=$oportunidad->id;    
                }
            }
        }        
        return $ids;
    }

    public static function tieneAutorizacion($oportunidad_id){
        $usuario=Auth::user();
        $oportunidad=Oportunidad::where('id',$oportunidad_id)->first();
        if(!empty($oportunidad)){            
            if(Campania::tieneAutorizacionGeneral($oportunidad->campania->id)){                
                return true;
            }else{
                if($oportunidad->responsable_id==$usuario->id){
                    return true;
                }
            }
        }        
        return false;
    }

    /**
     * Define los join que deben ir en el query del datatable
     */
    public static function joinSegmento($model){
        return $model
            ->leftjoin('oportunidad', 'contacto.id', '=', 'oportunidad.contacto_id')

            ->leftjoin('campania', 'oportunidad.campania_id', '=', 'campania.id')
            ->leftjoin('tipo_campania as tipoCampania', 'campania.tipo_campania_id', '=', 'tipoCampania.id')
            ->leftjoin('estado_campania as estadoCampania', 'oportunidad.estado_campania_id', '=', 'estadoCampania.id')
            ->leftjoin('justificacion_estado_campania as razonCampania', 'oportunidad.justificacion_estado_campania_id', '=', 'razonCampania.id')
            ->leftjoin('categoria_oportunidad as categoriaOportunidad', 'oportunidad.categoria_oportunidad_id', '=', 'categoriaOportunidad.id');
    }

    /**
     * Define los select que deben ir en el query del datatable para exportaciones
     */
    public static function selectSegmento(){
        return [];
    }

    /**
     * Establece la obtención de los valores en los inputs de la vista de segmento
     */
    public static function inputsSegmento(){
        $dt_atributos = [
            'tipoCampanias',
            'campaniasOportunidad',
            'estadosCampanias',
            'razonesCampanias',
            'categoriasOportunidadContacto',
            'campaniaActiva',
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
    public static function filtroSegmento($valores, $query){
        $dt_atributos_in=[
            'tipoCampanias'=>'tipoCampania.id',
            'campaniasOportunidad'=>'campania.id',
            'estadosCampanias'=>'estadoCampania.id',
            'razonesCampanias'=>'razonCampania.id',
            'categoriasOportunidadContacto'=>'categoriaOportunidad.id'
        ];
        foreach($dt_atributos_in as $atributo => $enTabla){
            if(array_key_exists($atributo, $valores) 
            && is_array($valores[$atributo]) &&
            !empty($valores[$atributo])){
                $query->whereIn($enTabla,$valores[$atributo]);
            }
        }
        //Otras validaciones específicas
        if(array_key_exists('campaniaActiva', $valores) && $valores['campaniaActiva']!=''){
            //No se revisa solo con empty pues el valor 0 en activo implica no
            $query->where("campania.activa", $valores['campaniaActiva']);
        }
    } 

    /**
     * Retorna los días que lleva una oportunidad en el mismo estado
     */
    public function getDiasUltimaActualizacion($formato=false){
        $ahora = time();
        $ultimaActualizacion = strtotime($this->ultima_actualizacion);
        $diferencia = $ahora - $ultimaActualizacion;
        $dias=round($diferencia / (60 * 60 * 24));        
        if($formato){
            $diasEstado = TipoCampaniaEstados::
                where('tipo_campania_id',$this->campania->tipo_campania_id)
                ->where('estado_campania_id',$this->estado_campania_id)
                ->first()->dias_cambio;
            //Positivo
            $color=TipoEstadoColor::where('id',1)->first()->color_hexadecimal;
            if($diasEstado>0){
                if($diasEstado<$dias){
                    //Negativo
                    $color=TipoEstadoColor::where('id',3)->first()->color_hexadecimal;
                }else if($diasEstado==$dias){
                    //Neutro
                    $color=TipoEstadoColor::where('id',2)->first()->color_hexadecimal;
                }  
            }        
            return "<span style='color:{$color}'><i class='fa fa-circle'></i></span> ".$dias;  
        }else{
            return $dias;
        }        
    }

    /**
     * Contactos por última actualización
     */
    public static function oportunidadesPorActualizacion($campania, $responsable){   
        $oportunidades = Oportunidad::
        join('campania','oportunidad.campania_id','=','campania.id')
        ->join('tipo_campania','campania.tipo_campania_id','=','tipo_campania.id')  
        ->join('tipo_campania_estados', function($join){
            $join->on('tipo_campania_estados.estado_campania_id','=','oportunidad.estado_campania_id');
            $join->on('tipo_campania_estados.tipo_campania_id','=','tipo_campania.id');
        })        
        ->where('dias_cambio','>',0) //Diferente a estados finales.
        ->select('oportunidad.*');
        if(!empty($campania)){                    
            $oportunidades->where('campania_id',$campania->id);    
        }
        if(!empty($responsable)){
            $oportunidades->where('responsable_id',$responsable->id);    
        } 
        return $oportunidades->get();
    }  
}
