<?php

namespace App\Repositories\Parametros;

use App\Models\Parametros\MedioComunicacion;
use App\Repositories\BaseRepository;

/**
 * Class MedioComunicacionRepository
 * @package App\Repositories\Parametros
 * @version April 4, 2021, 12:13 am -05
*/

class MedioComunicacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'es_red_social'
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
        return MedioComunicacion::class;
    }
}
