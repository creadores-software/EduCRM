<?php

namespace App\Repositories\Parametros;

use App\Models\Parametros\EstadoCivil;
use App\Repositories\BaseRepository;

/**
 * Class EstadoCivilRepository
 * @package App\Repositories\Parametros
 * @version November 19, 2020, 10:52 pm UTC
*/

class EstadoCivilRepository extends BaseRepository
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
        return EstadoCivil::class;
    }
}
