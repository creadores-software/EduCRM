<?php

namespace App\Repositories\Contactos;

use App\Models\Contactos\Parentesco;
use App\Repositories\BaseRepository;

/**
 * Class ParentescoRepository
 * @package App\Repositories\Contactos
 * @version November 20, 2020, 3:28 am UTC
*/

class ParentescoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'contacto_origen',
        'contacto_destino',
        'tipo_parentesco_id',
        'acudiente'
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
        return Parentesco::class;
    }
}
