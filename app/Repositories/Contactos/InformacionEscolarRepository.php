<?php

namespace App\Repositories\Contactos;

use App\Models\Contactos\InformacionEscolar;
use App\Repositories\BaseRepository;

/**
 * Class InformacionEscolarRepository
 * @package App\Repositories\Contactos
 * @version November 19, 2020, 10:52 pm UTC
*/

class InformacionEscolarRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'contacto_id',
        'entidad_id',
        'nivel_educativo_id',
        'finalizado',
        'fecha_inicio',
        'fecha_grado'
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
        return InformacionEscolar::class;
    }
}
