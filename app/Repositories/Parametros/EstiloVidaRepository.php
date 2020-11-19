<?php

namespace App\Repositories\Parametros;

use App\Models\Parametros\EstiloVida;
use App\Repositories\BaseRepository;

/**
 * Class EstiloVidaRepository
 * @package App\Repositories\Parametros
 * @version November 19, 2020, 10:52 pm UTC
*/

class EstiloVidaRepository extends BaseRepository
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
        return EstiloVida::class;
    }
}
