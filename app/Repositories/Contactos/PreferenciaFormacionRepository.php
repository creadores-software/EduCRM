<?php

namespace App\Repositories\Contactos;

use App\Models\Contactos\PreferenciaFormacion;
use App\Repositories\BaseRepository;

/**
 * Class PreferenciaFormacionRepository
 * @package App\Repositories\Contactos
 * @version November 19, 2020, 10:53 pm UTC
*/

class PreferenciaFormacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'informacion_relacional_id',
        'formacion_id'
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
        return PreferenciaFormacion::class;
    }
}
