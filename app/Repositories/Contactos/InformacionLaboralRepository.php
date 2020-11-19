<?php

namespace App\Repositories\Contactos;

use App\Models\Contactos\InformacionLaboral;
use App\Repositories\BaseRepository;

/**
 * Class InformacionLaboralRepository
 * @package App\Repositories\Contactos
 * @version November 19, 2020, 10:52 pm UTC
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
        'fecha_fin'
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
