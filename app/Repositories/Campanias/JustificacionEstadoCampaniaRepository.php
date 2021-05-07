<?php

namespace App\Repositories\Campanias;

use App\Models\Campanias\JustificacionEstadoCampania;
use App\Repositories\BaseRepository;

/**
 * Class JustificacionEstadoCampaniaRepository
 * @package App\Repositories\Campanias
 * @version May 6, 2021, 11:29 pm -05
*/

class JustificacionEstadoCampaniaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'estado_campania_id',
        'nombre'
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
