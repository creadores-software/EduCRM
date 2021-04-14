<?php

namespace App\Repositories\Admin;

use Spatie\Permission\Models\Permission;
use App\Repositories\BaseRepository;
use Carbon\Carbon;

/**
 * Class PermissionRepository
 * @package App\Repositories\Admin
 * @version April 13, 2021, 10:39 pm -05
*/

class PermissionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'guard_name',
        'created_at',
        'updated_at'
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
        return Permission::class;
    }

    /**
     * Create model record    
     * @param array $input     
     * @return Model
     */
    public function create($input)
    {
        $model = $this->model->newInstance($input);   
        $timestamp=new Carbon();
        $model->created_at= $timestamp;
        $model->updated_at= $timestamp;
        $model->save();
        return $model;
    }

    /**
     * Update model record for given id     
     * @param array $input
     * @param int $id     
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function update($input, $id)
    {
        $query = $this->model->newQuery();
        $model = $query->findOrFail($id);
        $model->fill($input);
        $model->updated_at= new Carbon();
        $model->save();
        return $model;
    }
}
