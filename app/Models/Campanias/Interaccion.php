<?php

namespace App\Models\Campanias;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;


/**
 * Class Interaccion
 * @package App\Models\Campanias
 * @version May 13, 2021, 8:05 pm -05
 *
 * @property \App\Models\Campanias\Contacto $contacto
 * @property \App\Models\Campanias\EstadoInteraccion $estadoInteraccion
 * @property \App\Models\Campanias\Oportunidad $oportunidad
 * @property \App\Models\Campanias\TipoInteraccion $tipoInteraccion
 * @property \App\Models\Campanias\User $users
 * @property string|\Carbon\Carbon $fecha_inicio
 * @property string|\Carbon\Carbon $fecha_fin
 * @property integer $tipo_interaccion_id
 * @property integer $estado_interaccion_id
 * @property string $observacion
 * @property integer $oportunidad_id
 * @property integer $contacto_id
 * @property integer $users_id
 */
class Interaccion extends Model implements Recordable
{

    public $table = 'interaccion';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




    public $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'tipo_interaccion_id',
        'estado_interaccion_id',
        'observacion',
        'oportunidad_id',
        'contacto_id',
        'users_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fecha_inicio' => 'datetime',
        'fecha_fin' => 'datetime',
        'tipo_interaccion_id' => 'integer',
        'estado_interaccion_id' => 'integer',
        'observacion' => 'string',
        'oportunidad_id' => 'integer',
        'contacto_id' => 'integer',
        'users_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fecha_inicio' => 'required|after_or_equal:today',
        'fecha_fin' => 'required|after_or_equal:fecha_inicio',
        'tipo_interaccion_id' => 'required|integer',
        'estado_interaccion_id' => 'required|integer',
        'observacion' => 'string|max:255',
        'oportunidad_id' => 'nullable|integer',
        'contacto_id' => 'nullable|integer',
        'users_id' => 'required'
    ];

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
    public function estadoInteraccion()
    {
        return $this->belongsTo(\App\Models\Campanias\EstadoInteraccion::class, 'estado_interaccion_id')
        ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function oportunidad()
    {
        return $this->belongsTo(\App\Models\Campanias\Oportunidad::class, 'oportunidad_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipoInteraccion()
    {
        return $this->belongsTo(\App\Models\Campanias\TipoInteraccion::class, 'tipo_interaccion_id')
        ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function users()
    {
        return $this->belongsTo(\App\Models\Admin\User::class, 'users_id')
        ->withDefault(['name' => '']);
    }

    /**
     * Define los join que deben ir en el query del datatable
     */
    public static function joinDataTable($model){
        return $model
            ->leftjoin('interaccion', 'oportunidad.id', '=', 'interaccion.oportunidad_id')

            ->leftjoin('tipo_interaccion as tipoInteraccion', 'tipoInteraccion.id', '=', 'interaccion.tipo_interaccion_id')
            ->leftjoin('estado_interaccion as estadoInteraccion', 'estadoInteraccion.id', '=', 'interaccion.estado_interaccion_id');
    }

    /**
     * Define los select que deben ir en el query del datatable para exportaciones
     */
    public static function selectDataTable(){
        return [];
    }

    /**
     * Establece la obtención de los valores en los inputs de la vista de segmento
     */
    public static function inputsDataTable(){
        $dt_atributos = [
            'tipoInteracciones',
            'estadoInteracciones',
            'campaniaFechaInicialInicio',
            'campaniaFechaFinalInicio',
            'campaniaFechaInicialFin',
            'campaniaFechaFinalFin',
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
        $dt_atributos_in=[
            'tipoInteracciones'=>'tipoInteraccion.id',
            'estadoInteracciones'=>'estadoInteraccion.id',
        ];
        foreach($dt_atributos_in as $atributo => $enTabla){
            if(array_key_exists($atributo, $valores) 
            && is_array($valores[$atributo]) &&
            !empty($valores[$atributo])){
                $query->whereIn($enTabla,$valores[$atributo]);
            }
        }

        $dt_atributos_menor_que=[
            'campaniaFechaInicialInicio'=>'interaccion.fecha_inicio',
            'campaniaFechaInicialFin'=>'interaccion.fecha_fin',
        ];
        foreach($dt_atributos_menor_que as $atributo => $enTabla){
            if(array_key_exists($atributo, $valores) && !empty($valores[$atributo])){
                $query->whereRaw("{$enTabla} is not null and  {$enTabla} >= ?",[$valores[$atributo]]);
            }
        }

        $dt_atributos_mayor_que=[
            'campaniaFechaFinalInicio'=>'interaccion.fecha_inicio',
            'campaniaFechaFinalFin'=>'interaccion.fecha_fin',
        ];
        foreach($dt_atributos_mayor_que as $atributo => $enTabla){
            if(array_key_exists($atributo, $valores) && !empty($valores[$atributo])){
                $query->whereRaw("{$enTabla} is not null and  {$enTabla} <= ?",[$valores[$atributo]]);
            }
        }
    } 

    /**
     * Genera el dataset que se visualizara en el reporte de interacciones por estado
     */
    public static function reportePorEstado($campania, $responsable){
        $labels=TipoInteraccion::pluck('nombre')->toArray();
        $tipos = TipoInteraccion::get();
        $colores = TipoEstadoColor::get();
        $nombresEstados=[1=>"Realizada",2=>"Planeada",3=>"No efectiva"];
        $dataset=[];
        foreach($colores as $color){            
            $infoColor = ['label'=>$nombresEstados[$color->id], 'backgroundColor'=>$color->color_hexadecimal];
            $data=[];
            foreach($tipos as $tipo){
                $interacciones = Interaccion::join('estado_interaccion','interaccion.estado_interaccion_id','=','estado_interaccion.id')               
                ->leftjoin('oportunidad','interaccion.oportunidad_id','=','oportunidad.id')               
                ->leftjoin('campania','oportunidad.campania_id','=','campania.id')               
                ->leftjoin('users','interaccion.users_id','=','users.id')  
                ->where('tipo_estado_color_id',$color->id)
                ->where('tipo_interaccion_id',$tipo->id);
                if(!empty($campania)){                    
                    $interacciones->where('campania_id',$campania->id);    
                }
                if(!empty($responsable)){
                    $interacciones->where('users_id',$responsable->id);    
                }
                $data[]=$interacciones->count();
            }
            $infoColor['data']=$data;
            $dataset[] = $infoColor;
        } 
        return ['labels'=>$labels,'dataset'=>$dataset];
    }

    /** 
     * Retorna la hora (fecha inicio) de una interacción
     */
    public function getHora($formato=false){
        $hora=date("H:i",strtotime($this->fecha_inicio));              
        if($formato){
            $horaActual=date("H:i");    
            //Neutro
            $color=TipoEstadoColor::where('id',2)->first()->color_hexadecimal;
            if($horaActual>$hora){
                //Negativo
                $color=TipoEstadoColor::where('id',3)->first()->color_hexadecimal;
            }
            return "<span style='color:{$color}'><i class='fa fa-circle'></i></span> ".$hora;  
        }else{
            return $hora;
        }        
    }

    /** 
     * Retorna las interacciones planeadas para el día actual según campaña y responsable
     */
    public static function interaccionesPendientes($campania, $responsable){   
        $interacciones = Interaccion::where('estado_interaccion_id',2)
        ->leftjoin('oportunidad','interaccion.oportunidad_id','=','oportunidad.id')  
        ->whereRaw("DATE(fecha_inicio) = CURDATE()")
        ->select('interaccion.*');
        if(!empty($campania)){                    
            $interacciones->where('oportunidad.campania_id',$campania->id);    
        }
        if(!empty($responsable)){
            $interacciones->where('interaccion.users_id',$responsable->id);    
        } 
        return $interacciones->get();
    }

     /**
     * Se obtienen indicadores clave para el dashboard
     */
    public static function indicadoresInteracciones($campania, $responsable){   
        $interaccionesA=Interaccion::join('oportunidad','interaccion.oportunidad_id','oportunidad.id');  
        $interaccionesP=Interaccion::join('oportunidad','interaccion.oportunidad_id','oportunidad.id');          
        $interaccionesR=Interaccion::join('oportunidad','interaccion.oportunidad_id','oportunidad.id');            
        $interaccionesT=Interaccion::join('oportunidad','interaccion.oportunidad_id','oportunidad.id');

        return [
            'interaccionesAtrasadas'=>Interaccion::filtroInteracciones($interaccionesA,$campania,$responsable,1,true)->count(),
            'interaccionesPendientes'=>Interaccion::filtroInteracciones($interaccionesP,$campania,$responsable,2,true)->count(),
            'interaccionesRealizadas'=>Interaccion::filtroInteracciones($interaccionesR,$campania,$responsable,3,true)->count(),
            'interaccionesTotales'=>Interaccion::filtroInteracciones($interaccionesT,$campania,$responsable,4,true)->count(),
        ];
    }

    /**
     * Se añade condiciones al QueryBuilder de acuerdo a los parámetros dados.
     */
    public static function filtroInteracciones($query,$campania,$responsable,$estado,$retorno=false){  
        $tabla="";
        if(!$retorno){
            $tabla="interaccion.";    
        }
        switch($estado){
            case 1: 
                $query->where($tabla.'estado_interaccion_id',2)
                ->whereRaw($tabla."fecha_inicio < NOW()");
                break;
            case 2:
                $query->where($tabla.'estado_interaccion_id',2)
                ->whereRaw($tabla."fecha_inicio > NOW()") //No vencidas
                ->whereRaw("DATE({$tabla}fecha_inicio) = CURDATE()"); //De hoy     
                break;
            case 3: 
                $query->where($tabla.'estado_interaccion_id',1)   
                ->whereRaw(
                    "DATE({$tabla}fecha_inicio + INTERVAL (YEAR(NOW()) - YEAR({$tabla}fecha_inicio)) YEAR)
                    BETWEEN DATE(NOW() - INTERVAL WEEKDAY(NOW()) DAY)
                    AND DATE(NOW() + INTERVAL 6 - WEEKDAY(NOW()) DAY)"
                );     
                break;
            case 4: 
                $query->whereRaw(
                    "DATE({$tabla}fecha_inicio + INTERVAL (YEAR(NOW()) - YEAR({$tabla}fecha_inicio)) YEAR)
                    BETWEEN DATE(NOW() - INTERVAL WEEKDAY(NOW()) DAY)
                    AND DATE(NOW() + INTERVAL 6 - WEEKDAY(NOW()) DAY)"
                );     
                break;
        } 
                     
        if(!empty($campania)){ 
            $id=$campania;
            if(!is_int($campania) && !empty($campania)){
                $id=$campania->id;
            }
            if(!empty($id)){
                $query->where('oportunidad.campania_id',$id);
            } 
        }
        if(!empty($responsable)){
            $id=$responsable;
            if(!is_int($responsable) && !empty($responsable)){
                $id=$responsable->id;
            }
            if(!empty($id)){
                $query->where("{$tabla}.users_id",$id);
            } 
        }

        if($retorno){
            return $query;
        }        
    }
}
