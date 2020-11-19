<?php

namespace App\Repositories\Contactos;

use App\Models\Contactos\PreferenciaActividadOcio;
use App\Repositories\BaseRepository;

/**
 * Class PreferenciaActividadOcioRepository
 * @package App\Repositories\Contactos
 * @version November 19, 2020, 10:52 pm UTC
*/

class PreferenciaActividadOcioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'informacion_relacional_id',
        'actividad_ocio_id'
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
        return PreferenciaActividadOcio::class;
    }
}
