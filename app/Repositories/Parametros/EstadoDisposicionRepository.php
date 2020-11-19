<?php

namespace App\Repositories\Parametros;

use App\Models\Parametros\EstadoDisposicion;
use App\Repositories\BaseRepository;

/**
 * Class EstadoDisposicionRepository
 * @package App\Repositories\Parametros
 * @version November 19, 2020, 10:52 pm UTC
*/

class EstadoDisposicionRepository extends BaseRepository
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
        return EstadoDisposicion::class;
    }
}
