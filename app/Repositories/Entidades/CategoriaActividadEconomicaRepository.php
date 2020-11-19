<?php

namespace App\Repositories\Entidades;

use App\Models\Entidades\CategoriaActividadEconomica;
use App\Repositories\BaseRepository;

/**
 * Class CategoriaActividadEconomicaRepository
 * @package App\Repositories\Entidades
 * @version November 19, 2020, 10:51 pm UTC
*/

class CategoriaActividadEconomicaRepository extends BaseRepository
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
        return CategoriaActividadEconomica::class;
    }
}
