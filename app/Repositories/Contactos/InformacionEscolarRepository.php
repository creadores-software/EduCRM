<?php

namespace App\Repositories\Contactos;

use App\Models\Contactos\InformacionEscolar;
use App\Repositories\BaseRepository;

/**
 * Class InformacionEscolarRepository
 * @package App\Repositories\Contactos
 * @version April 5, 2021, 10:41 pm -05
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
        'fecha_inicio',
        'fecha_grado',
        'finalizado',
        'grado'
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
