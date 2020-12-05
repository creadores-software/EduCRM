<?php

namespace App\Http\Requests\Contactos;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Contactos\Contacto;

class CreateContactoRequest extends FormRequest
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
        $rules= Contacto::$rules;
        $rules['identificacion'] = [
            'nullable',
            'string',
            'max:30',
            'iunique:contacto,identificacion,'.$this->request->get('id'),
        ];
        return $rules;
    }
}
