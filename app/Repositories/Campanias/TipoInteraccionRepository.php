<?php

namespace App\Repositories\Campanias;

use App\Models\Campanias\TipoInteraccion;
use App\Repositories\BaseRepository;

/**
 * Class TipoInteraccionRepository
 * @package App\Repositories\Campanias
 * @version April 24, 2021, 2:04 pm -05
*/

class TipoInteraccionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'con_fecha_fin'
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
        return TipoInteraccion::class;
    }
}
