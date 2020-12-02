<?php

namespace App\Repositories\Formaciones;

use App\Models\Formaciones\NivelFormacion;
use App\Repositories\BaseRepository;

/**
 * Class NivelFormacionRepository
 * @package App\Repositories\Formaciones
 * @version December 1, 2020, 9:41 pm -05
*/

class NivelFormacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'es_ies'
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
