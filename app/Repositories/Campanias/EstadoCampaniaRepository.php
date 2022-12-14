<?php

namespace App\Repositories\Campanias;

use App\Models\Campanias\EstadoCampania;
use App\Models\Campanias\JustificacionEstadoCampania;
use App\Repositories\BaseRepository;

/**
 * Class EstadoCampaniaRepository
 * @package App\Repositories\Campanias
 * @version April 24, 2021, 2:04 pm -05
*/

class EstadoCampaniaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion',
        'tipo_estado_color_id'
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
        return EstadoCampania::class;
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
        $justificacion = new JustificacionEstadoCampania();
        $justificacion->nombre="No aplica"; //Estado por defecto
        $justificacion->estado_campania_id=$model->id;
        $justificacion->save();
        return $model;
    }
}
