<?php

namespace App\Repositories\Parametros;

use App\Models\Parametros\FrecuenciaUso;
use App\Repositories\BaseRepository;

/**
 * Class FrecuenciaUsoRepository
 * @package App\Repositories\Parametros
 * @version November 19, 2020, 10:52 pm UTC
*/

class FrecuenciaUsoRepository extends BaseRepository
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
        return FrecuenciaUso::class;
    }
}
