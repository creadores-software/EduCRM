<?php

namespace App\Repositories\Formaciones;

use App\Models\Formaciones\PeriodoAcademico;
use App\Repositories\BaseRepository;

/**
 * Class PeriodoAcademicoRepository
 * @package App\Repositories\Formaciones
 * @version April 24, 2021, 2:04 pm -05
*/

class PeriodoAcademicoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin'
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
        return PeriodoAcademico::class;
    }
}
