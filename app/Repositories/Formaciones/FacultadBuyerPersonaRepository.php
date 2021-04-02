<?php

namespace App\Repositories\Formaciones;

use App\Models\Formaciones\FacultadBuyerPersona;
use App\Repositories\BaseRepository;

/**
 * Class FacultadBuyerPersonaRepository
 * @package App\Repositories\Formaciones
 * @version April 2, 2021, 4:18 pm -05
*/

class FacultadBuyerPersonaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'facultad_id',
        'buyer_persona_id'
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
        return FacultadBuyerPersona::class;
    }
}
