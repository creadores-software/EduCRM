<?php

namespace App\Repositories\Formaciones;

use App\Models\Formaciones\Formacion;
use App\Repositories\BaseRepository;

/**
 * Class FormacionRepository
 * @package App\Repositories\Formaciones
 * @version November 19, 2020, 10:52 pm UTC
*/

class FormacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'entidad_id',
        'nivel_formacion_id',
        'campo_educacion_id',
        'activo'
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
        return Formacion::class;
    }
}
