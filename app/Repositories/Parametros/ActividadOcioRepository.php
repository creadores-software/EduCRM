<?php

namespace App\Repositories\Parametros;

use App\Models\Parametros\ActividadOcio;
use App\Repositories\BaseRepository;

/**
 * Class ActividadOcioRepository
 * @package App\Repositories\Parametros
 * @version November 19, 2020, 10:51 pm UTC
*/

class ActividadOcioRepository extends BaseRepository
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
        return ActividadOcio::class;
    }
}
