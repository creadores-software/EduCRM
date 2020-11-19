<?php

namespace App\Repositories\Parametros;

use App\Models\Parametros\Generacion;
use App\Repositories\BaseRepository;

/**
 * Class GeneracionRepository
 * @package App\Repositories\Parametros
 * @version November 19, 2020, 10:52 pm UTC
*/

class GeneracionRepository extends BaseRepository
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
        return Generacion::class;
    }
}
