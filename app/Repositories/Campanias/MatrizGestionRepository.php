<?php

namespace App\Repositories\Campanias;

use App\Models\Campanias\MatrizGestion;
use App\Repositories\BaseRepository;

/**
 * Class MatrizGestionRepository
 * @package App\Repositories\Campanias
 * @version April 24, 2021, 2:04 pm -05
*/

class MatrizGestionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'accion',
        'descripcion',
        'interes_minimo',
        'interes_maximo',
        'probabilidad_minima',
        'probabilidad_maxima',
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
        return MatrizGestion::class;
    }
}
