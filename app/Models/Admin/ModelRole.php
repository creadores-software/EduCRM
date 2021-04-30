<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class ModelRole
 * @package App\Models\Admin
 * @version April 13, 2021, 10:39 pm -05
 *
 * @property \App\Models\Admin\Role $role
 * @property string $model_type
 * @property integer $model_id
 */
class ModelRole extends Model implements Recordable
{

    public $table = 'model_has_roles';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




    public $fillable = [
        'model_type',
        'model_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'role_id' => 'integer',
        'model_type' => 'string',
        'model_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'model_type' => 'required|string|max:255',
        'model_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function role()
    {
        return $this->belongsTo(\App\Models\Admin\Role::class, 'role_id');
    }
}
