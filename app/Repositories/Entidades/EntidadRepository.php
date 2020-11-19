<?php

namespace App\Repositories\Entidades;

use App\Models\Entidades\Entidad;
use App\Repositories\BaseRepository;

/**
 * Class EntidadRepository
 * @package App\Repositories\Entidades
 * @version November 19, 2020, 10:52 pm UTC
*/

class EntidadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'lugar_id',
        'direccion',
        'telefono',
        'sector_id',
        'actividad_economica_id',
        'mi_universidad'
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
        return Entidad::class;
    }
}
