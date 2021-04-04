<?php

namespace App\Repositories\Formaciones;

use App\Models\Formaciones\NivelFormacion;
use App\Repositories\BaseRepository;

/**
 * Class NivelFormacionRepository
 * @package App\Repositories\Formaciones
 * @version April 3, 2021, 11:47 pm -05
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
