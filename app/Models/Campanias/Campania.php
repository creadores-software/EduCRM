<?php

namespace App\Models\Campanias;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;
use App\Models\Admin\PertenenciaEquipoMercadeo;
use Illuminate\Support\Facades\Auth;

/**
 * Class Campania
 * @package App\Models\Campanias
 * @version April 24, 2021, 2:04 pm -05
 *
 * @property \App\Models\Campanias\EquipoMercadeo $equipoMercadeo
 * @property \App\Models\Campanias\Facultad $facultad
 * @property \App\Models\Campanias\NivelAcademico $nivelAcademico
 * @property \App\Models\Campanias\NivelFormacion $nivelFormacion
 * @property \App\Models\Campanias\PeriodoAcademico $periodoAcademico
 * @property \App\Models\Campanias\Segmento $segmento
 * @property \App\Models\Campanias\TipoCampania $tipoCampania
 * @property \Illuminate\Database\Eloquent\Collection $campaniaFormaciones
 * @property \Illuminate\Database\Eloquent\Collection $oportunidads
 * @property integer $tipo_campania_id
 * @property string $nombre
 * @property integer $periodo_academico_id
 * @property integer $equipo_mercadeo_id
 * @property string $fecha_inicio
 * @property string $fecha_final
 * @property string $descripcion
 * @property number $inversion
 * @property integer $nivel_formacion_id
 * @property integer $nivel_academico_id
 * @property integer $facultad_id
 * @property integer $segmento_id
 * @property boolean $activa
 */
class Campania extends Model implements Recordable
{

    public $table = 'campania';
    use \Altek\Accountant\Recordable;
     //Para los eventos de BelongsToMany
     use \Altek\Eventually\Eventually;
    
    public $timestamps = false;




    public $fillable = [
        'tipo_campania_id',
        'nombre',
        'periodo_academico_id',
        'equipo_mercadeo_id',
        'fecha_inicio',
        'fecha_final',
        'descripcion',
        'inversion',
        'nivel_formacion_id',
        'nivel_academico_id',
        'facultad_id',
        'segmento_id',
        'activa'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tipo_campania_id' => 'integer',
        'nombre' => 'string',
        'periodo_academico_id' => 'integer',
        'equipo_mercadeo_id' => 'integer',
        'fecha_inicio' => 'date:Y-m-d',
        'fecha_final' => 'date:Y-m-d',
        'descripcion' => 'string',
        'inversion' => 'float',
        'nivel_formacion_id' => 'integer',
        'nivel_academico_id' => 'integer',
        'facultad_id' => 'integer',
        'segmento_id' => 'integer',
        'activa' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tipo_campania_id' => 'required|integer',
        'nombre' => 'required|string|max:150',
        'periodo_academico_id' => 'required|integer',
        'equipo_mercadeo_id' => 'required|integer',
        'fecha_inicio' => 'nullable',
        'fecha_final' => 'nullable',
        'descripcion' => 'nullable|string',
        'inversion' => 'nullable|numeric|min:0',
        'nivel_formacion_id' => 'nullable|integer',
        'nivel_academico_id' => 'nullable|integer',
        'facultad_id' => 'nullable|integer',
        'segmento_id' => 'nullable|integer',
        'activa' => 'required|boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function equipoMercadeo()
    {
        return $this->belongsTo(\App\Models\Admin\EquipoMercadeo::class, 'equipo_mercadeo_id')
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
    public function nivelAcademico()
    {
        return $this->belongsTo(\App\Models\Formaciones\NivelAcademico::class, 'nivel_academico_id')
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function periodoAcademico()
    {
        return $this->belongsTo(\App\Models\Formaciones\PeriodoAcademico::class, 'periodo_academico_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function segmento()
    {
        return $this->belongsTo(\App\Models\Contactos\Segmento::class, 'segmento_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipoCampania()
    {
        return $this->belongsTo(\App\Models\Campanias\TipoCampania::class, 'tipo_campania_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function campaniaFormacionesAsociadas()
    {
        return $this->belongsToMany(\App\Models\Formaciones\Formacion::class, 'campania_formaciones','campania_id','formacion_id',);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function oportunidades()
    {
        return $this->hasMany(\App\Models\Campanias\Oportunidad::class, 'campania_id');
    }

    public static function tieneAutorizacionGeneral($idCampania){
        $usuario=Auth::user();
        $campania=Campania::where('id',$idCampania)->first();
        if(!empty($campania)){
            $esLider=PertenenciaEquipoMercadeo::
                where('es_lider',1)
                ->where('users_id',$usuario->id)
                ->where('equipo_mercadeo_id',$campania->equipo_mercadeo_id)->first();

            if($usuario->hasRole(['Superadmin']) || $esLider){                
                return true;
            }   
        }       
        return false;
    }

    /**
     * Genera el dataset que se visualizara en el reporte de funnel en campa??as
     */
    public static function reporteFunnel($campania, $responsable){
        $labels=[];
        $dataset=[];  
        if(!empty($campania)){
            $labels=TipoCampaniaEstados::
                join('estado_campania','tipo_campania_estados.estado_campania_id','=','estado_campania.id')
                ->where('tipo_campania_estados.tipo_campania_id',$campania->tipo_campania_id)
                ->orderBy('orden','DESC')
                ->pluck('estado_campania.nombre')->toArray();                  
                
            $valoresAnteriores=[];
            $data=[]; 
            $color=[];

            $estados=TipoCampaniaEstados::
                join('estado_campania','tipo_campania_estados.estado_campania_id','=','estado_campania.id')
                ->where('tipo_campania_estados.tipo_campania_id',$campania->tipo_campania_id)
                ->orderBy('orden','DESC')->get();
            
            foreach($estados as $estado){
                $estadoCampania = $estado->estadoCampania;

                $oportunidades = Oportunidad
                    ::where('estado_campania_id',$estadoCampania->id)
                    ->where('campania_id',$campania->id);
                if(!empty($responsable)){
                    $oportunidades->where('responsable_id',$responsable->id);
                }

                $cantidad=$oportunidades->count();
                //Si tiene estados que procedieron del mismo, aumenta cantidad
                if(array_key_exists($estado->id,$valoresAnteriores)){
                    $cantidad+=$valoresAnteriores[$estado->id];
                } 

                //Si tiene un estado del que procede se tiene en cuenta la cantidad
                $estadoAnterior=TipoCampaniaEstados::
                    join('estado_campania','tipo_campania_estados.estado_campania_id','=','estado_campania.id')
                    ->where('tipo_campania_estados.tipo_campania_id',$campania->tipo_campania_id)
                    ->where('orden','<',$estado->orden)
                    ->where('dias_cambio','>',0)
                    ->orderBy('orden', 'DESC')
                    ->first();
                if(!empty($estadoAnterior)){
                    if(array_key_exists($estadoAnterior->id,$valoresAnteriores)){
                        $valoresAnteriores[$estadoAnterior->id]+=$cantidad;                    
                    }else{
                        $valoresAnteriores[$estadoAnterior->id]=$cantidad; 
                    }                 
                }                 

                $data[]=$cantidad;
                $color[]=$estadoCampania->tipoEstadoColor->color_hexadecimal;
            }  
            $dataset=[
                [
                    'data'=> array_reverse($data),
                    'backgroundColor'=> array_reverse($color),
                    'hoverBackgroundColor'=>  array_reverse($color)
                ]
            ]; 
        }
        return ['labels'=>array_reverse($labels),'dataset'=>$dataset];
    }
}
