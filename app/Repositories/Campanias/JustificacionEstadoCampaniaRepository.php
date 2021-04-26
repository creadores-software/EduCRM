<?php

namespace App\Repositories\Campanias;

use App\Models\Campanias\JustificacionEstadoCampania;
use App\Repositories\BaseRepository;

/**
 * Class JustificacionEstadoCampaniaRepository
 * @package App\Repositories\Campanias
 * @version April 24, 2021, 2:04 pm -05
*/

class JustificacionEstadoCampaniaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'estado_campania_id',
        'nombre',
        'descripcion'
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
        return JustificacionEstadoCampania::class;
    }
}
