<?php

namespace App\Repositories\Parametros;

use App\Models\Parametros\EstatusUsuario;
use App\Repositories\BaseRepository;

/**
 * Class EstatusUsuarioRepository
 * @package App\Repositories\Parametros
 * @version November 19, 2020, 10:52 pm UTC
*/

class EstatusUsuarioRepository extends BaseRepository
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
        return EstatusUsuario::class;
    }
}
