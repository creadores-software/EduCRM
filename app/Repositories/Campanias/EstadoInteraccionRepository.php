<?php

namespace App\Repositories\Campanias;

use App\Models\Campanias\EstadoInteraccion;
use App\Repositories\BaseRepository;

/**
 * Class EstadoInteraccionRepository
 * @package App\Repositories\Campanias
 * @version April 24, 2021, 2:04 pm -05
*/

class EstadoInteraccionRepository extends BaseRepository
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
        return EstadoInteraccion::class;
    }
}
