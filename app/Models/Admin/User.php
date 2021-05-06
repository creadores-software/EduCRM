<?php

namespace App\Models\Admin;

use App\Models\Admin\PertenenciaEquipoMercadeo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Altek\Accountant\Contracts\Identifiable;
use Spatie\Permission\Traits\HasRoles;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class User
 * @package App\Models\Admin
 * @version April 13, 2021, 10:34 pm -05
 *
 * @property string $name
 * @property string $email
 * @property string|\Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property boolean $active
 * @property string|\Carbon\Carbon $created_at
 * @property string|\Carbon\Carbon $updated_at
 */

class User extends Authenticatable implements Identifiable, Recordable
{
    use Notifiable,HasRoles;
    use \Altek\Accountant\Recordable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string',
        'active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'email_verified_at' => 'nullable',
        'password' => 'required|string|max:255',
        'remember_token' => 'nullable|string|max:100',
        'active' => 'nullable|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function getIdentifier()
    {
        return $this->getKey();
    }

    public function equiposMercadeo()
    {
        return PertenenciaEquipoMercadeo::where('users_id',$this->id)->get();
    }
}
