<?php

namespace App\Repositories\Formaciones;

use App\Models\Formaciones\CategoriaCampoEducacion;
use App\Repositories\BaseRepository;

/**
 * Class CategoriaCampoEducacionRepository
 * @package App\Repositories\Formaciones
 * @version November 19, 2020, 10:51 pm UTC
*/

class CategoriaCampoEducacionRepository extends BaseRepository
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
        return CategoriaCampoEducacion::class;
    }
}
