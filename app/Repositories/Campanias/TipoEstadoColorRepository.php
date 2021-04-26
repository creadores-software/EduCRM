<?php

namespace App\Repositories\Campanias;

use App\Models\Campanias\TipoEstadoColor;
use App\Repositories\BaseRepository;

/**
 * Class TipoEstadoColorRepository
 * @package App\Repositories\Campanias
 * @version April 24, 2021, 2:04 pm -05
*/

class TipoEstadoColorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'color_hexadecimal'
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
        return TipoEstadoColor::class;
    }
}
