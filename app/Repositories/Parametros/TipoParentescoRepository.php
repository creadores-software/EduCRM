<?php

namespace App\Repositories\Parametros;

use App\Models\Parametros\TipoParentesco;
use App\Repositories\BaseRepository;

/**
 * Class TipoParentescoRepository
 * @package App\Repositories\Parametros
 * @version November 19, 2020, 10:54 pm UTC
*/

class TipoParentescoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'tipo_contrario_id'
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
        return TipoParentesco::class;
    }
}
