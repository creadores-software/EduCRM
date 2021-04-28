<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class ModelPermission
 * @package App\Models\Admin
 * @version April 13, 2021, 10:39 pm -05
 *
 * @property \App\Models\Admin\Permission $permission
 * @property string $model_type
 * @property integer $model_id
 */
class ModelPermission extends Model implements Recordable
{

    public $table = 'model_has_permissions';
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
        'permission_id' => 'integer',
        'model_type' => 'string',
        'model_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'model_type' => 'required|string|max:191',
        'model_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function permission()
    {
        return $this->belongsTo(\App\Models\Admin\Permission::class, 'permission_id');
    }
}
