<?php

namespace App\Repositories\Entidades;

use App\Models\Entidades\Entidad;
use App\Repositories\BaseRepository;

/**
 * Class EntidadRepository
 * @package App\Repositories\Entidades
 * @version April 3, 2021, 9:36 pm -05
*/

class EntidadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'nit',
        'lugar_id',
        'direccion',
        'barrio',
        'correo',
        'telefono',
        'sitio_web',
        'sector_id',
        'actividad_economica_id',
        'codigo_ies',
        'acreditacion_ies',
        'calendario',
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
