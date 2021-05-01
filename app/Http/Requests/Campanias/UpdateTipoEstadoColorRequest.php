<?php

namespace App\Http\Requests\Campanias;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Campanias\TipoEstadoColor;

class UpdateTipoEstadoColorRequest extends FormRequest
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
        $rules= TipoEstadoColor::$rules;
        $rules['nombre'] = [
            'required',
            'string',
            'max:45',
            'iunique:tipo_estado_color,nombre,'.$this->request->get('id'),
        ];
        return $rules;
    }
}
