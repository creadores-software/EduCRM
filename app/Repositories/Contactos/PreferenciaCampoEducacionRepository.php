<?php

namespace App\Repositories\Contactos;

use App\Models\Contactos\PreferenciaCampoEducacion;
use App\Repositories\BaseRepository;

/**
 * Class PreferenciaCampoEducacionRepository
 * @package App\Repositories\Contactos
 * @version November 19, 2020, 10:53 pm UTC
*/

class PreferenciaCampoEducacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'campo_educacion_id',
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
        return PreferenciaCampoEducacion::class;
    }
}
