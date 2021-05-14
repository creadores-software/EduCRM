<?php

namespace App\Repositories\Campanias;

use App\Models\Campanias\Interaccion;
use App\Repositories\BaseRepository;

/**
 * Class InteraccionRepository
 * @package App\Repositories\Campanias
 * @version May 13, 2021, 8:05 pm -05
*/

class InteraccionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha_inicio',
        'fecha_fin',
        'tipo_interaccion_id',
        'estado_interaccion_id',
        'observacion',
        'oportunidad_id',
        'contacto_id',
        'users_id'
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
        return Interaccion::class;
    }
}
