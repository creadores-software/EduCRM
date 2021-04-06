<?php

namespace App\Repositories\Contactos;

use App\Models\Contactos\InformacionLaboral;
use App\Repositories\BaseRepository;

/**
 * Class InformacionLaboralRepository
 * @package App\Repositories\Contactos
 * @version April 5, 2021, 10:01 pm -05
*/

class InformacionLaboralRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'contacto_id',
        'entidad_id',
        'ocupacion_id',
        'area',
        'funciones',
        'telefono',
        'fecha_inicio',
        'fecha_fin',
        'vinculado_actualmente'
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
        return InformacionLaboral::class;
    }
}
