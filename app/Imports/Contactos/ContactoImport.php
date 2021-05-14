<?php

namespace App\Imports\Contactos;

use App\Models\Contactos\Contacto;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Cache;

class ContactoImport implements OnEachRow, WithHeadingRow, WithValidation,SkipsOnFailure,WithChunkReading
{
    use Importable, SkipsFailures;
    

    public function onRow(Row $row)
    {
        $row      = $row->toArray();
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
            'estrato' => $row['estrato'],
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
        $rules['telefonor'] = [               
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
