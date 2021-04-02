<?php

namespace App\Repositories\Formaciones;

use App\Models\Formaciones\TipoAcceso;
use App\Repositories\BaseRepository;

/**
 * Class TipoAccesoRepository
 * @package App\Repositories\Formaciones
 * @version April 2, 2021, 4:18 pm -05
*/

class TipoAccesoRepository extends BaseRepository
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
        return TipoAcceso::class;
    }
}
