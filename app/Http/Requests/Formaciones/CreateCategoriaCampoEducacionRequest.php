<?php

namespace App\Http\Requests\Formaciones;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Formaciones\CategoriaCampoEducacion;

class CreateCategoriaCampoEducacionRequest extends FormRequest
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
        $rules= CategoriaCampoEducacion::$rules;
        $rules['nombre'] = [
            'required',
            'string',
            'max:150',
            'iunique:categoria_campo_educacion,nombre,'.$this->request->get('id'),
        ];
        return $rules;
    }
}
