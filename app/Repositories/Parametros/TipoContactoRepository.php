<?php

namespace App\Repositories\Parametros;

use App\Models\Parametros\TipoContacto;
use App\Repositories\BaseRepository;

/**
 * Class TipoContactoRepository
 * @package App\Repositories\Parametros
 * @version November 19, 2020, 10:53 pm UTC
*/

class TipoContactoRepository extends BaseRepository
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
        return TipoContacto::class;
    }
}
