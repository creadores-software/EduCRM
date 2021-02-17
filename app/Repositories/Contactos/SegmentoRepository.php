<?php

namespace App\Repositories\Contactos;

use App\Models\Contactos\Segmento;
use App\Repositories\BaseRepository;

/**
 * Class SegmentoRepository
 * @package App\Repositories\Contactos
 * @version February 17, 2021, 10:01 am -05
*/

class SegmentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion',
        'filtros',
        'global',
        'usuario_id'
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
        return Segmento::class;
    }
}
