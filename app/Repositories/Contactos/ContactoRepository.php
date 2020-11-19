<?php

namespace App\Repositories\Contactos;

use App\Models\Contactos\Contacto;
use App\Repositories\BaseRepository;

/**
 * Class ContactoRepository
 * @package App\Repositories\Contactos
 * @version November 19, 2020, 10:51 pm UTC
*/

class ContactoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipo_documento_id',
        'identificacion',
        'prefijo_id',
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'genero_id',
        'estado_civil_id',
        'celular',
        'telefono',
        'correo_personal',
        'correo_institucional',
        'lugar_residencia',
        'direccion_residencia',
        'estrato',
        'activo',
        'observacion'
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
        return Contacto::class;
    }
}
