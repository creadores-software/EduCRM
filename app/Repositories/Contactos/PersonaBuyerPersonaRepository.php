<?php

namespace App\Repositories\Contactos;

use App\Models\Contactos\PersonaBuyerPersona;
use App\Repositories\BaseRepository;

/**
 * Class PersonaBuyerPersonaRepository
 * @package App\Repositories\Contactos
 * @version April 2, 2021, 4:18 pm -05
*/

class PersonaBuyerPersonaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'buyer_persona_id',
        'informacion_relacional_id'
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
        return PersonaBuyerPersona::class;
    }
}
