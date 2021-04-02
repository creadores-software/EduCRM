<?php

namespace App\Repositories\Formaciones;

use App\Models\Formaciones\NivelAcademico;
use App\Repositories\BaseRepository;

/**
 * Class NivelAcademicoRepository
 * @package App\Repositories\Formaciones
 * @version April 2, 2021, 4:18 pm -05
*/

class NivelAcademicoRepository extends BaseRepository
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
        return NivelAcademico::class;
    }
}
