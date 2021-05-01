<?php

namespace App\Repositories\Formaciones;

use App\Models\Formaciones\Facultad;
use App\Repositories\BaseRepository;

/**
 * Class FacultadRepository
 * @package App\Repositories\Formaciones
 * @version April 2, 2021, 4:18 pm -05
*/

class FacultadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
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
        return Facultad::class;
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
        $model->save();
        if(array_key_exists('perfilesBuyersPersona',$input)){            
            $model->perfilesBuyersPersona()->sync((array)$input['perfilesBuyersPersona']);
        }else{
            $model->perfilesBuyersPersona()->sync([]);
        }         
        return $model;
    }
}
