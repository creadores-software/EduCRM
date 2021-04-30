<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Admin\User;

class UpdateUserRequest extends FormRequest
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
        $rules = User::$rules;
        //No requerido en actualización
        $rules['password'] = [
            'nullable',
            'string',
            'max:255',
            'iunique:users,email,'.$this->request->get('id'),
        ];
        $rules['email'] = [
            'required',
            'string',
            'max:255',
            'iunique:users,email,'.$this->request->get('id'),
        ];
        return $rules;
    }
}
