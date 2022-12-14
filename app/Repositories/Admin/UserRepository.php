<?php

namespace App\Repositories\Admin;

use App\Models\Admin\User;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRepository
 * @package App\Repositories\Admin
 * @version April 13, 2021, 10:34 pm -05
*/

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'active',
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
        return User::class;
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
        $model->password=Hash::make($input['password']);
        $model->created_at= $timestamp;
        $model->updated_at= $timestamp;
        $model->save();

        if(array_key_exists('uroles',$input)){            
            $model->syncRoles((array)$input['uroles']);
        }else{
            $model->syncRoles([]);
        }

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
        if(array_key_exists('password',$input)){            
            $model->password=Hash::make($input['password']);
        } 
        $model->save();

        if(array_key_exists('uroles',$input)){            
            $model->syncRoles((array)$input['uroles']);
        }else{
            $model->syncRoles([]);
        }

        if ($model->wasChanged()) {
            $model->updated_at= new Carbon();
            $model->save();
        }

        return $model;
    }
}
