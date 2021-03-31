<?php

namespace App\Repositories\Contactos;

use App\Models\Contactos\InformacionUniversitaria;
use App\Repositories\BaseRepository;

/**
 * Class InformacionUniversitariaRepository
 * @package App\Repositories\Contactos
 * @version December 25, 2020, 12:27 pm -05
*/

class InformacionUniversitariaRepository extends BaseRepository
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
        return InformacionUniversitaria::class;
    }
}
