<?php

namespace App\Repositories\Parametros;

use App\Models\Parametros\Sisben;
use App\Repositories\BaseRepository;

/**
 * Class SisbenRepository
 * @package App\Repositories\Parametros
 * @version April 24, 2021, 2:04 pm -05
*/

class SisbenRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Sisben::class;
    }
}
