<?php

namespace App\Repositories\Parametros;

use App\Models\Parametros\Prefijo;
use App\Repositories\BaseRepository;

/**
 * Class PrefijoRepository
 * @package App\Repositories\Parametros
 * @version November 19, 2020, 10:53 pm UTC
*/

class PrefijoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'genero_id',
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
        return Prefijo::class;
    }
}
