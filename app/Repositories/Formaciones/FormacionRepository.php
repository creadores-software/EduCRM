<?php

namespace App\Repositories\Formaciones;

use App\Models\Formaciones\Formacion;
use App\Repositories\BaseRepository;

/**
 * Class FormacionRepository
 * @package App\Repositories\Formaciones
 * @version April 4, 2021, 1:08 pm -05
*/

class FormacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'entidad_id',
        'nivel_formacion_id',
        'codigo_snies',
        'titulo_otorgado',
        'campo_educacion_id',
        'modalidad_id',
        'periodicidad_id',
        'periodos_duracion',
        'reconocimiento_id',
        'costo_matricula',
        'activo',
        'facultad_id'
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
        return Formacion::class;
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
        
        if(array_key_exists('perfilesBuyersPersona',$input)){            
            $model->perfilesBuyersPersona()->sync((array)$input['perfilesBuyersPersona']);
        }else{
            $model->perfilesBuyersPersona()->sync([]);
        } 

        $model->save();
        return $model;
    }

    /**
     * Create model record
     * @param array $input
     * @return Model
     */
    public function create($input)
    {
        $model = $this->model->newInstance($input);
        if(array_key_exists('perfilesBuyersPersona',$input)){            
            $model->perfilesBuyersPersona()->sync((array)$input['perfilesBuyersPersona']);
        }else{
            $model->perfilesBuyersPersona()->sync([]);
        } 
        $model->save();
        return $model;
    }
}
