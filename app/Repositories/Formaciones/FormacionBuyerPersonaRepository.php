<?php

namespace App\Repositories\Formaciones;

use App\Models\Formaciones\FormacionBuyerPersona;
use App\Repositories\BaseRepository;

/**
 * Class FormacionBuyerPersonaRepository
 * @package App\Repositories\Formaciones
 * @version April 2, 2021, 4:18 pm -05
*/

class FormacionBuyerPersonaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'formacion_id',
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
        return FormacionBuyerPersona::class;
    }
}
