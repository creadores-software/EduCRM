<?php

namespace App\Repositories\Contactos;

use App\Models\Contactos\PreferenciaMedioComunicacion;
use App\Repositories\BaseRepository;

/**
 * Class PreferenciaMedioComunicacionRepository
 * @package App\Repositories\Contactos
 * @version November 19, 2020, 10:53 pm UTC
*/

class PreferenciaMedioComunicacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'informacion_relacional_id',
        'medio_comunicacion_id'
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
        return PreferenciaMedioComunicacion::class;
    }
}
