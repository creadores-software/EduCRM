<?php

namespace App\Repositories\Contactos;

use App\Models\Contactos\InformacionAcademica;
use App\Repositories\BaseRepository;

/**
 * Class InformacionAcademicaRepository
 * @package App\Repositories\Contactos
 * @version December 25, 2020, 12:27 pm -05
*/

class InformacionAcademicaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'contacto_id',
        'entidad_id',
        'formacion_id',
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
        return InformacionAcademica::class;
    }
}
