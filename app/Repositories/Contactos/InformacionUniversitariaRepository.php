<?php

namespace App\Repositories\Contactos;

use App\Models\Contactos\InformacionUniversitaria;
use App\Repositories\BaseRepository;

/**
 * Class InformacionUniversitariaRepository
 * @package App\Repositories\Contactos
 * @version April 5, 2021, 10:54 pm -05
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
        'tipo_acceso_id',
        'fecha_inicio',
        'fecha_grado',
        'finalizado',
        'promedio',
        'periodo_alcanzado'
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
