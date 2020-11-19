<?php

namespace App\Repositories\Contactos;

use App\Models\Contactos\InformacionAcademica;
use App\Repositories\BaseRepository;

/**
 * Class InformacionAcademicaRepository
 * @package App\Repositories\Contactos
 * @version November 19, 2020, 10:52 pm UTC
*/

class InformacionAcademicaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'contacto_id',
        'formacion_id',
        'finalizado',
        'fecha_grado_estimada',
        'fecha_grado_real'
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
