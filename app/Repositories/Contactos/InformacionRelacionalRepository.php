<?php

namespace App\Repositories\Contactos;

use App\Models\Contactos\InformacionRelacional;
use App\Repositories\BaseRepository;

/**
 * Class InformacionRelacionalRepository
 * @package App\Repositories\Contactos
 * @version December 1, 2020, 11:01 pm -05
*/

class InformacionRelacionalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'maximo_nivel_formacion_id',
        'ocupacion_actual_id',
        'estilo_vida_id',
        'religion_id',
        'raza_id',
        'generacion_id',
        'personalidad_id',
        'beneficio_id',
        'frecuencia_uso_id',
        'estatus_usuario_id',
        'estatus_lealtad_id',
        'estado_disposicion_id',
        'actitud_servicio_id',
        'autoriza_comunicacion',
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
        return InformacionRelacional::class;
    }
}
