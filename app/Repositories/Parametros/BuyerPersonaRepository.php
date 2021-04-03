<?php

namespace App\Repositories\Parametros;

use App\Models\Parametros\BuyerPersona;
use App\Repositories\BaseRepository;

/**
 * Class BuyerPersonaRepository
 * @package App\Repositories\Parametros
 * @version April 2, 2021, 4:19 pm -05
*/

class BuyerPersonaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion'
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
        return BuyerPersona::class;
    }
}
