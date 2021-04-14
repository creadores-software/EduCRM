<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class RolePermission
 * @package App\Models\Admin
 * @version April 13, 2021, 10:39 pm -05
 *
 * @property \App\Models\Admin\Permission $permission
 * @property \App\Models\Admin\Role $role
 * @property integer $role_id
 */
class RolePermission extends Model implements Recordable
{

    public $table = 'role_has_permissions';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




    public $fillable = [
        'role_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'permission_id' => 'integer',
        'role_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'role_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function permission()
    {
        return $this->belongsTo(\App\Models\Admin\Permission::class, 'permission_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function role()
    {
        return $this->belongsTo(\App\Models\Admin\Role::class, 'role_id');
    }
}
