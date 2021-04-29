<?php

namespace App\Http\Requests\Campanias;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Campanias\CategoriaOportunidad;

class UpdateCategoriaOportunidadRequest extends FormRequest
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
        $rules= CategoriaOportunidad::$rules;
        $rules['nombre'] = [
            'required',
            'string',
            'max:45',
            'iunique:categoria_oportunidad,nombre,'.$this->request->get('id'),
        ];
        return $rules;
    }
}
