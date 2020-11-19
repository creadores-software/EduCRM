<?php

namespace App\Repositories\Entidades;

use App\Models\Entidades\Ocupacion;
use App\Repositories\BaseRepository;

/**
 * Class OcupacionRepository
 * @package App\Repositories\Entidades
 * @version November 19, 2020, 10:53 pm UTC
*/

class OcupacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'tipo_ocupacion_id'
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
        return Ocupacion::class;
    }
}
