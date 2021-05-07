<?php

namespace App\Repositories\Campanias;

use App\Models\Campanias\Campania;
use App\Repositories\BaseRepository;

/**
 * Class CampaniaRepository
 * @package App\Repositories\Campanias
 * @version April 24, 2021, 2:04 pm -05
*/

class CampaniaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Campania::class;
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
        if(array_key_exists('campaniaFormaciones',$input)){            
            $model->campaniaFormaciones()->sync((array)$input['campaniaFormaciones']);
        }else{
            $model->campaniaFormaciones()->sync([]);
        } 
        return $model;
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

        if(array_key_exists('campaniaFormaciones',$input)){            
            $model->campaniaFormaciones()->sync((array)$input['campaniaFormaciones']);
        }else{
            $model->campaniaFormaciones()->sync([]);
        }

        $model->save();
        return $model;
    }
}
