<?php

namespace App\Repositories\Parametros;

use App\Models\Parametros\ActitudServicio;
use App\Repositories\BaseRepository;

/**
 * Class ActitudServicioRepository
 * @package App\Repositories\Parametros
 * @version November 19, 2020, 10:48 pm UTC
*/

class ActitudServicioRepository extends BaseRepository
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
        return ActitudServicio::class;
    }
}
