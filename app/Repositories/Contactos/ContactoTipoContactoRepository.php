<?php

namespace App\Repositories\Contactos;

use App\Models\Contactos\ContactoTipoContacto;
use App\Repositories\BaseRepository;

/**
 * Class ContactoTipoContactoRepository
 * @package App\Repositories\Contactos
 * @version November 19, 2020, 10:51 pm UTC
*/

class ContactoTipoContactoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipo_contacto_id',
        'contacto_id'
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
        return ContactoTipoContacto::class;
    }
}
