<?php

namespace App\Repositories\Entidades;

use App\Models\Entidades\TipoOcupacion;
use App\Repositories\BaseRepository;

/**
 * Class TipoOcupacionRepository
 * @package App\Repositories\Entidades
 * @version November 19, 2020, 10:54 pm UTC
*/

class TipoOcupacionRepository extends BaseRepository
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
        return TipoOcupacion::class;
    }
}
