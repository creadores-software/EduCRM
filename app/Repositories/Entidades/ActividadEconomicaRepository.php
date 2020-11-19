<?php

namespace App\Repositories\Entidades;

use App\Models\Entidades\ActividadEconomica;
use App\Repositories\BaseRepository;

/**
 * Class ActividadEconomicaRepository
 * @package App\Repositories\Entidades
 * @version November 19, 2020, 10:50 pm UTC
*/

class ActividadEconomicaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'categoria_actividad_economica_id',
        'nombre',
        'es_ies',
        'es_colegio'
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
        return ActividadEconomica::class;
    }
}
