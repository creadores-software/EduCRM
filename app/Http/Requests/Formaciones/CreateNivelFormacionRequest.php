<?php

namespace App\Http\Requests\Formaciones;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Formaciones\NivelFormacion;

class CreateNivelFormacionRequest extends FormRequest
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
        $rules= NivelFormacion::$rules;
        $rules['nombre'] = [
            'required',
            'string',
            'max:100',
            'iunique:nivel_formacion,nombre,'.$this->request->get('id'),
        ];
        return $rules;
    }
}
