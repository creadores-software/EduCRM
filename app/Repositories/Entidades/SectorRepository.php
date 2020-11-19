<?php

namespace App\Repositories\Entidades;

use App\Models\Entidades\Sector;
use App\Repositories\BaseRepository;

/**
 * Class SectorRepository
 * @package App\Repositories\Entidades
 * @version November 19, 2020, 10:53 pm UTC
*/

class SectorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
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
        return Sector::class;
    }
}
