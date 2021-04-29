<?php

namespace App\Repositories\Campanias;

use App\Models\Campanias\Oportunidad;
use App\Repositories\BaseRepository;

/**
 * Class OportunidadRepository
 * @package App\Repositories\Campanias
 * @version April 28, 2021, 10:08 pm -05
*/

class OportunidadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'campania_id',
        'contacto_id',
        'formacion_id',
        'responsable_id',
        'estado_campania_id',
        'justificacion_estado_campania_id',
        'interes',
        'probabilidad',
        'categoria_oportunidad_id',
        'ingreso_recibido',
        'ingreso_proyectado',
        'adicion_manual'
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
        return Oportunidad::class;
    }
}
