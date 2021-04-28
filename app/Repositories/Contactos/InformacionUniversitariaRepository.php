<?php

namespace App\Repositories\Contactos;

use App\Models\Contactos\InformacionUniversitaria;
use App\Repositories\BaseRepository;

/**
 * Class InformacionUniversitariaRepository
 * @package App\Repositories\Contactos
 * @version April 28, 2021, 9:26 am -05
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
        'periodo_academico_inicial',
        'periodo_academico_final',
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
