<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\Permission\Models\Role;

class UpdateRoleRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:191',
            'guard_name' => 'required|string|max:191',
            'created_at' => 'nullable',
            'updated_at' => 'nullable'
        ];
        $rules['name'] = [
            'required',
            'string',
            'max:191',
            'iunique:roles,name,'.$this->request->get('id'),
        ];
        return $rules;
    }
}
