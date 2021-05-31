<?php

namespace App\Imports\Campanias;

use App\Models\Campanias\CategoriaOportunidad;
use App\Models\Campanias\Oportunidad;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Cache;
use Carbon\Carbon;
use Exception;

class OportunidadImport implements OnEachRow, WithHeadingRow, WithValidation,SkipsOnFailure,WithChunkReading
{
    use Importable, SkipsFailures;
    private $failuresFK=[];

    private function validarFK($row,$indice,$class,$column,$name){        
        $objeto = $class::where('id',$row[$column])->first();       
        if(!empty($row[$column]) && empty($objeto)){
            $this->failuresFK[] = new Failure($indice,'column',["No existe {$name} con este id"]);               
        }
    }

    private function validarTodasFK($row,$indice){
        $atributosForaneos=[
           ["App\Models\Campanias\Campania",'campania_id','campaña'],
           ["App\Models\Contactos\Contacto",'contacto_id','contacto'],
           ["App\Models\Formaciones\Formacion",'formacion_id','formacion'],
           ["App\Models\Admin\User",'responsable_id','usuario'],
           ["App\Models\Campanias\EstadoCampania",'estado_campania_id','estado de campaña'],
           ["App\Models\Campanias\JustificacionEstadoCampania",'justificacion_estado_campania_id','razón (justificación)'],
        ];
        foreach($atributosForaneos as $atributos){
            $this->validarFK($row,$indice,$atributos[0],$atributos[1],$atributos[2]);
        }    
        $this->failures = array_merge($this->failures, $this->failuresFK); 
    }

    private function validacionesEspeciales($row,$indice){

        //No debe existir una oportunidad previamente para la misma formación, contacto y compania
        $oportunidadExistente = Oportunidad
            ::where('campania_id',$row['campania_id'])
            ->where('contacto_id',$row['contacto_id'])
            ->where('formacion_id',$row['formacion_id'])
            ->first();
        if(!empty($oportunidadExistente)){
            $failure = new Failure($indice,'contacto_id',["Ya existe una oportunidad en este campaña para este contacto y formación"]);                   
            $this->failures = array_merge($this->failures, [$failure]); 
        }
        //La justificacion (razón) debe estar asociada al estado

        //El estado debe pertenecer al tipo de campaña

        //La formación debe corresponder con la parametrización de la campaña

        //El responsable debe pertenecer al equipo de la campaña

    }

    public function onRow(Row $row)
    {
        $indice = $row->getIndex();
        $row      = $row->toArray();
        try{ 
            $this->validarTodasFK($row,$indice);
            $this->validacionesEspeciales($row,$indice);            
            if(empty($this->failures)){ 
                $categoria_id=null;
                $categoria = CategoriaOportunidad::categoriaPorDatos($row['interes'],$row['capacidad']);
                if(!empty($categoria)){
                    $categoria_id=$categoria->id;    
                }
                $oportunidad=Oportunidad::firstOrCreate([
                    'campania_id' => $row['campania_id'],
                    'contacto_id' => $row['contacto_id'],
                    'formacion_id' => $row['formacion_id'],
                    'responsable_id' => $row['responsable_id'],
                    'estado_campania_id' => $row['estado_campania_id'],
                    'justificacion_estado_campania_id' => $row['justificacion_estado_campania_id'],
                    'interes' => $row['interes'],
                    'capacidad' => $row['capacidad'],
                    'categoria_oportunidad_id' => $categoria_id,
                    'ingreso_recibido' => $row['ingreso_recibido'],
                    'ingreso_proyectado' => $row['ingreso_proyectado'],
                    'adicion_manual' => 1,
                    'ultima_actualizacion'=> new Carbon(),
                ]);
                Cache::increment('cantidadImportados');            
            }
        }catch(Exception $e){
            $failure = new Failure($indice,'bd',['Excepción no controlada:'.$e->getMessage()]);
            $this->failures = array_merge($this->failures, [$failure]);
        }
  
    }

    public function rules(): array
    {
        $rules= Oportunidad::$rules;
        return $rules;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
