<?php

namespace App\Repositories\Admin;

use App\Models\Admin\PertenenciaEquipoMercadeo;
use App\Repositories\BaseRepository;

/**
 * Class PertenenciaEquipoMercadeoRepository
 * @package App\Repositories\Admin
 * @version April 24, 2021, 2:04 pm -05
*/

class PertenenciaEquipoMercadeoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'users_id',
        'equipo_mercadeo_id',
        'es_lider'
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
        return PertenenciaEquipoMercadeo::class;
    }
}
