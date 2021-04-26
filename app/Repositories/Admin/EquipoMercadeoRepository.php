<?php

namespace App\Repositories\Admin;

use App\Models\Admin\EquipoMercadeo;
use App\Repositories\BaseRepository;

/**
 * Class EquipoMercadeoRepository
 * @package App\Repositories\Admin
 * @version April 24, 2021, 2:04 pm -05
*/

class EquipoMercadeoRepository extends BaseRepository
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
        return EquipoMercadeo::class;
    }
}
