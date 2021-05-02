<?php

namespace App\Repositories\Campanias;

use App\Models\Campanias\TipoInteraccion;
use App\Repositories\BaseRepository;

/**
 * Class TipoInteraccionRepository
 * @package App\Repositories\Campanias
 * @version April 24, 2021, 2:04 pm -05
*/

class TipoInteraccionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'con_fecha_fin'
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
        return TipoInteraccion::class;
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
        
        if(array_key_exists('tipoInteraccionEstados',$input)){            
            $model->tipoInteraccionEstados()->sync((array)$input['tipoInteraccionEstados']);
        }else{
            $model->tipoInteraccionEstados()->sync([]);
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
        if(array_key_exists('tipoInteraccionEstados',$input)){            
            $model->tipoInteraccionEstados()->sync((array)$input['tipoInteraccionEstados']);
        }else{
            $model->tipoInteraccionEstados()->sync([]);
        }         
        return $model;
    }
}
