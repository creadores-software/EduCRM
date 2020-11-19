<?php

namespace App\Repositories\Formaciones;

use App\Models\Formaciones\CampoEducacion;
use App\Repositories\BaseRepository;

/**
 * Class CampoEducacionRepository
 * @package App\Repositories\Formaciones
 * @version November 19, 2020, 10:51 pm UTC
*/

class CampoEducacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'categoria_campo_educacion_id',
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
        return CampoEducacion::class;
    }
}
