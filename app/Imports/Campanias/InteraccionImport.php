<?php

namespace App\Imports\Campanias;

use App\Models\Campanias\Interaccion;
use App\Models\Campanias\TipoInteraccionEstados;
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
use Exception;
use DateTime;
use Illuminate\Support\Facades\Log;

class InteraccionImport implements OnEachRow, WithHeadingRow, WithValidation,SkipsOnFailure,WithChunkReading
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
           ["App\Models\Campanias\Oportunidad",'oportunidad_id','oportunidad'],
           ["App\Models\Admin\User",'users_id','usuario'],
           ["App\Models\Campanias\TipoInteraccion",'tipo_interaccion_id','tipo de interacción'],
           ["App\Models\Campanias\EstadoInteraccion",'estado_interaccion_id','estado de interacción'],
        ];
        foreach($atributosForaneos as $atributos){
            $this->validarFK($row,$indice,$atributos[0],$atributos[1],$atributos[2]);
        }    
        $this->failures = array_merge($this->failures, $this->failuresFK); 
    }

    private function validacionesEspeciales($row,$indice){
        $failuresEspeciales=[];
        $fecha_inicio = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha_inicio']);
        $fecha_fin = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha_fin']);
        
        //No debe existir una interaccion previamente para el mismo usuario, oportunidad y fecha_inicio
        $interaccionExistente = Interaccion
            ::where('users_id',$row['users_id'])
            ->where('oportunidad_id',$row['oportunidad_id'])
            ->where('fecha_inicio',$fecha_inicio)
            ->first();
        if(!empty($interaccionExistente)){
            $failuresEspeciales[] = new Failure($indice,'oportunidad_id',["Ya existe una interaccion con esta oportunidad para el mismo usuario y fecha"]);                   
        }        
        //El estado de interacción debe estar asociado al tipo de interacción
        $estadoAsociado = TipoInteraccionEstados::
            where('tipo_interaccion_id',$row['tipo_interaccion_id'])
            ->where('estado_interaccion_id',$row['estado_interaccion_id'])
            ->first();
        if(empty($estadoAsociado)){
            $failuresEspeciales[] = new Failure($indice,'estado_interaccion_id',["El estado de interacción no corresponde al tipo de interacción"]);                               
        }

        //Interacciones realizadas no deben ser de fechas mayores a la actual       
        $fecha_actual = new DateTime('NOW');  
       if($row['estado_interaccion_id']<>2){
            if($fecha_inicio>$fecha_actual){
                $failuresEspeciales[] = new Failure($indice,'fecha_inicio',["Para interacciones realizadas o no efectivas la fecha no puede ser superior a la actual"]);                   
            }
        }else{
            if($fecha_inicio<$fecha_actual){
                $failuresEspeciales[] = new Failure($indice,'fecha_inicio',["Para interacciones planeadas la fecha no puede ser inferior a la actual"]); 
            }   
        }
        if($fecha_fin->format('Y-m-d')!=$fecha_inicio->format('Y-m-d')){
            $failuresEspeciales[] = new Failure($indice,'fecha_inicio',["La fecha inicial y fecha final deben ser el mismo día con variación de hora según corresponda."]);
        }
        if($fecha_fin<$fecha_inicio){
            $failuresEspeciales[] = new Failure($indice,'fecha_fin',["La fecha final debe ser superior a la fecha inicial."]);
        }
        $this->failures = array_merge($this->failures, $failuresEspeciales);     
    }

    public function onRow(Row $row)
    {
        $indice = $row->getIndex();
        $row      = $row->toArray();
        try{ 
            $this->validarTodasFK($row,$indice);
            $this->validacionesEspeciales($row,$indice);
            if(empty($this->failures)){ 
                $interaccion=Interaccion::firstOrCreate([
                    'oportunidad_id' => $row['oportunidad_id'],
                    'users_id' => $row['users_id'],
                    'fecha_inicio' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha_inicio']),
                    'fecha_fin' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha_fin']),
                    'tipo_interaccion_id' => $row['tipo_interaccion_id'],
                    'estado_interaccion_id' => $row['estado_interaccion_id'],
                    'observacion' => $row['observacion'],
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
        $rules= Interaccion::$rules;
        //Se realizan validaciones en el método validacionesEspeciales
        $rules['fecha_inicio'] = ['required'];
        $rules['fecha_fin'] = ['required'];
        return $rules;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
