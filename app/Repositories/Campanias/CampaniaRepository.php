<?php

namespace App\Repositories\Campanias;

use App\Models\Campanias\Campania;
use App\Repositories\BaseRepository;

/**
 * Class CampaniaRepository
 * @package App\Repositories\Campanias
 * @version April 24, 2021, 2:04 pm -05
*/

class CampaniaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipo_campania_id',
        'nombre',
        'periodo_academico_id',
        'equipo_mercadeo_id',
        'fecha_inicio',
        'fecha_final',
        'descripcion',
        'inversion',
        'nivel_formacion_id',
        'nivel_academico_id',
        'facultad_id',
        'segmento_id',
        'activa'
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
        return Campania::class;
    }
}
