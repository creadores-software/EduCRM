<?php

namespace App\Repositories\Parametros;

use App\Models\Parametros\TipoDocumento;
use App\Repositories\BaseRepository;

/**
 * Class TipoDocumentoRepository
 * @package App\Repositories\Parametros
 * @version November 11, 2020, 4:13 am UTC
*/

class TipoDocumentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'abreviacion'
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
        return TipoDocumento::class;
    }
}
