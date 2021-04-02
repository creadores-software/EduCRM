<?php

namespace App\Repositories\Formaciones;

use App\Models\Formaciones\Reconocimiento;
use App\Repositories\BaseRepository;

/**
 * Class ReconocimientoRepository
 * @package App\Repositories\Formaciones
 * @version April 2, 2021, 4:18 pm -05
*/

class ReconocimientoRepository extends BaseRepository
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
        return Reconocimiento::class;
    }
}
