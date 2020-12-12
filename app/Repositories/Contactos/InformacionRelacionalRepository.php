<?php

namespace App\Repositories\Contactos;

use App\Models\Contactos\InformacionRelacional;
use App\Repositories\BaseRepository;

/**
 * Class InformacionRelacionalRepository
 * @package App\Repositories\Contactos
 * @version December 1, 2020, 11:01 pm -05
*/

class InformacionRelacionalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'maximo_nivel_formacion_id',
        'ocupacion_actual_id',
        'estilo_vida_id',
        'religion_id',
        'raza_id',
        'generacion_id',
        'personalidad_id',
        'beneficio_id',
        'frecuencia_uso_id',
        'estatus_usuario_id',
        'estatus_lealtad_id',
        'estado_disposicion_id',
        'actitud_servicio_id',
        'autoriza_comunicacion',
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return InformacionRelacional::class;
    }

    /**
     * Update model record for given id
     *
     * @param array $input
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function update($input, $id)
    {
        $query = $this->model->newQuery();
        $model = $query->findOrFail($id);
        $model->fill($input);
        if(array_key_exists('preferenciasFormaciones',$input)){            
            $model->preferenciasFormaciones()->sync((array)$input['preferenciasFormaciones']);
        } 
        if(array_key_exists('preferenciasMediosComunicacion',$input)){            
            $model->preferenciasMediosComunicacion()->sync((array)$input['preferenciasMediosComunicacion']);
        }  
        if(array_key_exists('preferenciasCamposEducacion',$input)){            
            $model->preferenciasCamposEducacion()->sync((array)$input['preferenciasCamposEducacion']);
        } 
        if(array_key_exists('preferenciasActividadesOcio',$input)){            
            $model->preferenciasActividadesOcio()->sync((array)$input['preferenciasActividadesOcio']);
        }        
        $model->save();
        return $model;
    }
}
