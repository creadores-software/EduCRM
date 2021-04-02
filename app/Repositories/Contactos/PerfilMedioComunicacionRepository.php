<?php

namespace App\Repositories\Contactos;

use App\Models\Contactos\PerfilMedioComunicacion;
use App\Repositories\BaseRepository;

/**
 * Class PerfilMedioComunicacionRepository
 * @package App\Repositories\Contactos
 * @version April 2, 2021, 4:17 pm -05
*/

class PerfilMedioComunicacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'medio_comunicacion_id',
        'informacion_relacional_id',
        'perfil'
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
        return PerfilMedioComunicacion::class;
    }
}
