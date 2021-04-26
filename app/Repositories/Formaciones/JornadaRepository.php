<?php

namespace App\Repositories\Formaciones;

use App\Models\Formaciones\Jornada;
use App\Repositories\BaseRepository;

/**
 * Class JornadaRepository
 * @package App\Repositories\Formaciones
 * @version April 24, 2021, 2:04 pm -05
*/

class JornadaRepository extends BaseRepository
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
        return Jornada::class;
    }
}
