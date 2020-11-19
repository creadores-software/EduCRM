<?php

namespace App\Repositories\Formaciones;

use App\Models\Formaciones\NivelFormacion;
use App\Repositories\BaseRepository;

/**
 * Class NivelFormacionRepository
 * @package App\Repositories\Formaciones
 * @version November 19, 2020, 10:53 pm UTC
*/

class NivelFormacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'nivel_academico_id'
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
        return NivelFormacion::class;
    }
}
