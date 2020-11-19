<?php

namespace App\Repositories\Parametros;

use App\Models\Parametros\EstatusLealtad;
use App\Repositories\BaseRepository;

/**
 * Class EstatusLealtadRepository
 * @package App\Repositories\Parametros
 * @version November 19, 2020, 10:52 pm UTC
*/

class EstatusLealtadRepository extends BaseRepository
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
        return EstatusLealtad::class;
    }
}
