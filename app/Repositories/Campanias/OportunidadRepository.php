<?php

namespace App\Repositories\Campanias;

use App\Models\Campanias\Oportunidad;
use App\Repositories\BaseRepository;
use Carbon\Carbon;

/**
 * Class OportunidadRepository
 * @package App\Repositories\Campanias
 * @version May 11, 2021, 10:28 pm -05
*/

class OportunidadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'campania_id',
        'contacto_id',
        'formacion_id',
        'responsable_id',
        'estado_campania_id',
        'justificacion_estado_campania_id',
        'interes',
        'capacidad',
        'categoria_oportunidad_id',
        'ingreso_recibido',
        'ingreso_proyectado',
        'adicion_manual',
        'ultima_actualizacion',
        'ultima_interaccion'
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
        return Oportunidad::class;
    }

    /**
     * Create model record
     * @param array $input
     * @return Model
     */
    public function create($input)
    {
        $model = $this->model->newInstance($input); 
        $model->ultima_actualizacion= new Carbon();       
        $model->save();
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
            $model->ultima_actualizacion= new Carbon(); 
            $model->save();
        }
        return $model;
    }
}
