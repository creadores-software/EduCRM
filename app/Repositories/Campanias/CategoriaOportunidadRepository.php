<?php

namespace App\Repositories\Campanias;

use App\Models\Campanias\CategoriaOportunidad;
use App\Repositories\BaseRepository;

/**
 * Class CategoriaOportunidadRepository
 * @package App\Repositories\Campanias
 * @version April 28, 2021, 10:01 pm -05
*/

class CategoriaOportunidadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion',
        'interes_minimo',
        'interes_maximo',
        'capacidad_minima',
        'capacidad_maxima',
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
        return CategoriaOportunidad::class;
    }
}
