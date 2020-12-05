<?php

namespace App\Http\Requests\Entidades;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Entidades\CategoriaActividadEconomica;

class UpdateCategoriaActividadEconomicaRequest extends FormRequest
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
        $rules= CategoriaActividadEconomica::$rules;
        $rules['nombre'] = [
            'required',
            'string',
            'max:150',
            'iunique:categoria_actividad_economica,nombre,'.$this->request->get('id'),
        ];
        return $rules;
    }
}
