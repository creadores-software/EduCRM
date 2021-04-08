<?php

namespace App\Http\Requests\Formaciones;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Formaciones\Reconocimiento;

class UpdateReconocimientoRequest extends FormRequest
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
        $rules= Reconocimiento::$rules;
        $rules['nombre'] = [
            'required',
            'string',
            'max:45',
            'iunique:reconocimiento,nombre,'.$this->request->get('id'),
        ];
        return $rules;
    }
}
