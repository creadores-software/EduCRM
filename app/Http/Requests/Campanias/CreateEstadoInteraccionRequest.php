<?php

namespace App\Http\Requests\Campanias;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Campanias\EstadoInteraccion;

class CreateEstadoInteraccionRequest extends FormRequest
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
        $rules= EstadoInteraccion::$rules;
        $rules['nombre'] = [
            'required',
            'string',
            'max:45',
            'iunique:estado_interaccion,nombre,'.$this->request->get('id'),
        ];
        return $rules;
    }
}
