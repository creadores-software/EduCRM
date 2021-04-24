<?php

namespace App\Repositories\Contactos;

use App\Models\Contactos\Contacto;
use App\Repositories\BaseRepository;

/**
 * Class ContactoRepository
 * @package App\Repositories\Contactos
 * @version April 24, 2021, 1:30 pm -05
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
        'barrio',
        'estrato',
        'sisben_id',
        'observacion',
        'referido_por',
        'origen_id',
        'otro_origen',
        'activo',
        'informacion_relacional_id'
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
