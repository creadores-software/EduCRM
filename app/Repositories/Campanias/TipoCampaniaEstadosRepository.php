<?php

namespace App\Repositories\Campanias;

use App\Models\Campanias\TipoCampaniaEstados;
use App\Repositories\BaseRepository;

/**
 * Class TipoCampaniaEstadosRepository
 * @package App\Repositories\Campanias
 * @version April 24, 2021, 2:04 pm -05
*/

class TipoCampaniaEstadosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipo_campania_id',
        'estado_campania_id',
        'orden',
        'dias_cambio'
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
        return TipoCampaniaEstados::class;
    }
}
