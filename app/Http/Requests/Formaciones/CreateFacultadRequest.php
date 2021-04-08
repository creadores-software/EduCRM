<?php

namespace App\Http\Requests\Formaciones;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Formaciones\Facultad;

class CreateFacultadRequest extends FormRequest
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
        $rules= Facultad::$rules;
        $rules['nombre'] = [
            'required',
            'string',
            'max:45',
            'iunique:facultad,nombre,'.$this->request->get('id'),
        ];
        return $rules;
    }
}
