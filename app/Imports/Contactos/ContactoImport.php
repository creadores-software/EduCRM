<?php

namespace App\Imports\Contactos;

use App\Models\Contactos\Contacto;
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

class ContactoImport implements OnEachRow, WithHeadingRow, WithValidation,SkipsOnFailure,WithChunkReading
{
    use Importable, SkipsFailures;
    private $failuresFK=[];

    private function validarFk($row,$indice,$class,$column,$name){        
        $objeto = $class::where('id',$row[$column])->first();       
        if(!empty($row[$column]) && empty($objeto)){
            $this->failuresFK[] = new Failure($indice,'column',["No existe {$name} con este id"]);               
        }
    }

    private function validarTodasKf($row,$indice){
        $atributosForaneos=[
           ["App\Models\Parametros\TipoDocumento",'tipo_documento_id','tipo de documento'],
           ["App\Models\Parametros\Prefijo",'prefijo_id','prefijo'],
           ["App\Models\Parametros\Genero",'genero_id','genero'],
           ["App\Models\Parametros\EstadoCivil",'estado_civil_id','estado civil'],
           ["App\Models\Parametros\Lugar",'lugar_residencia','lugar'],
           ["App\Models\Parametros\Sisben",'sisben_id','sisben'],
           ["App\Models\Parametros\Origen",'origen_id','origen'],
           ["App\Models\Formaciones\NivelFormacion",'maximo_nivel_formacion_id','nivel de formación'],
           ["App\Models\Entidades\Ocupacion",'ocupacion_actual_id','ocupación'],
           ["App\Models\Parametros\EstiloVida",'estilo_vida_id','estilo de vida'],
           ["App\Models\Parametros\Religion",'religion_id','religion'],
           ["App\Models\Parametros\Raza",'raza_id','raza'],
           ["App\Models\Parametros\Generacion",'generacion_id','generación'],
           ["App\Models\Parametros\Personalidad",'personalidad_id','personalidad'],
           ["App\Models\Parametros\Beneficio",'beneficio_id','beneficio'],
           ["App\Models\Parametros\FrecuenciaUso",'frecuencia_uso_id','frecuencia de uso'],
           ["App\Models\Parametros\EstatusUsuario",'estatus_usuario_id','estatus usuario'],
           ["App\Models\Parametros\EstatusLealtad",'estatus_lealtad_id','estatus lealtad'],
           ["App\Models\Parametros\EstadoDisposicion",'estado_disposicion_id','estado de disposición'],
           ["App\Models\Parametros\ActitudServicio",'actitud_servicio_id','actitud servicio'],
        ];
        foreach($atributosForaneos as $atributos){
            $this->validarFk($row,$indice,$atributos[0],$atributos[1],$atributos[2]);
        }    
        $this->failures = array_merge($this->failures, $this->failuresFK); 
    }

    public function onRow(Row $row)
    {
        $indice = $row->getIndex();
        $row      = $row->toArray();
        try{ 
            $this->validarTodasKf($row,$indice);
            if(empty($this->failuresFK)){                       
                //Los contactos que se importan son activos
                $row['activo']=1; 
                $contacto = Contacto::firstOrCreate([
                    'tipo_documento_id' => $row['tipo_documento_id'],
                    'identificacion' => $row['identificacion'],
                    'prefijo_id' => $row['prefijo_id'],
                    'nombres' => $row['nombres'],
                    'apellidos' => $row['apellidos'],
                    'fecha_nacimiento' => $row['fecha_nacimiento'],
                    'genero_id' => $row['genero_id'],
                    'estado_civil_id' => $row['estado_civil_id'],
                    'celular' => $row['celular'],
                    'telefono' => $row['telefono'],
                    'correo_personal' => $row['correo_personal'],
                    'correo_institucional' => $row['correo_institucional'],
                    'lugar_residencia' => $row['lugar_residencia'],
                    'direccion_residencia' => $row['direccion_residencia'],
                    'barrio' => $row['barrio'],
                    'estrato' => $row['estrato'],
                    'sisben_id' => $row['sisben_id'],
                    'observacion' => $row['observacion'],
                    'origen_id' => $row['origen_id'],
                    'referido_por' => $row['referido_por'],
                    'otro_origen' => $row['otro_origen']
                ]); 
                //La información relacional se crea automáticamente después de crear el contacto
                $informacionRelacional=$contacto->informacionRelacional;

                $informacionRelacional->maximo_nivel_formacion_id=$row['maximo_nivel_formacion_id'];
                $informacionRelacional->ocupacion_actual_id=$row['ocupacion_actual_id'];
                $informacionRelacional->estilo_vida_id=$row['estilo_vida_id'];
                $informacionRelacional->religion_id=$row['religion_id'];
                $informacionRelacional->raza_id=$row['raza_id'];
                $informacionRelacional->generacion_id=$row['generacion_id'];
                $informacionRelacional->personalidad_id=$row['personalidad_id'];
                $informacionRelacional->beneficio_id=$row['beneficio_id'];
                $informacionRelacional->frecuencia_uso_id=$row['frecuencia_uso_id'];
                $informacionRelacional->estatus_usuario_id=$row['estatus_usuario_id'];
                $informacionRelacional->estatus_lealtad_id=$row['estatus_lealtad_id'];
                $informacionRelacional->estado_disposicion_id=$row['estado_disposicion_id'];
                $informacionRelacional->actitud_servicio_id=$row['actitud_servicio_id'];
                $autoriza=$row['autoriza_comunicacion'];
                if(empty($autoriza)){
                    $autoriza=1;    
                }
                $informacionRelacional->autoriza_comunicacion=$autoriza;

                $informacionRelacional->save();  
                Cache::increment('cantidadImportados');            
            }
        }catch(Exception $e){
            $failure = new Failure($indice,'bd',[$e->getMessage()]);
            $this->failures = array_merge($this->failures, ['Excepción no controlado']);
        }
  
    }

    public function rules(): array
    {
        $rules= Contacto::$rules;
        //Se debe establecer como alfanumerico pues de excel se leen los valores como números y no pasan la validación
        $rules['identificacion'] = [               
            'nullable',
            'alpha_num',
            'max:30',
            'unique:contacto',
        ];
        $rules['celular'] = [               
            'required',
            'alpha_num',
            'max:15',
        ];
        $rules['telefono'] = [               
            'nullable',
            'alpha_num',
            'max:15',
        ];
        return $rules;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
