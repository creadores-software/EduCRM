<?php

namespace App\Repositories\Campanias;

use App\Models\Campanias\Interaccion;
use App\Repositories\BaseRepository;
use Carbon\Carbon;

/**
 * Class InteraccionRepository
 * @package App\Repositories\Campanias
 * @version May 13, 2021, 8:05 pm -05
*/

class InteraccionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha_inicio',
        'fecha_fin',
        'tipo_interaccion_id',
        'estado_interaccion_id',
        'observacion',
        'oportunidad_id',
        'contacto_id',
        'users_id'
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
        return Interaccion::class;
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
        $model->oportunidad->ultima_interaccion= new Carbon(); 
        $model->oportunidad->save();
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
        $model->save();
        if ($model->wasChanged()) {
            $model->oportunidad->ultima_interaccion= new Carbon(); 
            $model->oportunidad->save();
        }
        return $model;
    }
}
