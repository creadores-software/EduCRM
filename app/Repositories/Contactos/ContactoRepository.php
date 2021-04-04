<?php

namespace App\Repositories\Contactos;

use App\Models\Contactos\Contacto;
use App\Repositories\BaseRepository;

/**
 * Class ContactoRepository
 * @package App\Repositories\Contactos
 * @version December 1, 2020, 10:53 pm -05
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
        'activo',
        'observacion',
        'informacion_relacional_id',
        'origen_id',
        'referido_por',
        'otro_origen'
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

    /**
     * Update model record for given id
     *
     * @param array $input
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function update($input, $id)
    {
        $query = $this->model->newQuery();
        $model = $query->findOrFail($id);
        $model->fill($input);

        if(array_key_exists('tiposContacto',$input)){            
            $model->tiposContacto()->sync((array)$input['tiposContacto']);
        }else{
            $model->tiposContacto()->sync([]);
        }

        $model->save();
        return $model;
    }
}
