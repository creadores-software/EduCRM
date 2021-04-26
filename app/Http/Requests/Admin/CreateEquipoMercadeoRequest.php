<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Admin\EquipoMercadeo;

class CreateEquipoMercadeoRequest extends FormRequest
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
        $rules= EquipoMercadeo::$rules;
        $rules['nombre'] = [
            'required',
            'string',
            'max:45',
            'iunique:equipo_mercadeo,nombre,'.$this->request->get('id'),
        ];
        return $rules;
    }
}
