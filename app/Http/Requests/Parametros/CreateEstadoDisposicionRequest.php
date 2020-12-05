<?php

namespace App\Http\Requests\Parametros;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Parametros\EstadoDisposicion;

class CreateEstadoDisposicionRequest extends FormRequest
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
        $rules= EstadoDisposicion::$rules;
        $rules['nombre'] = [
            'required',
            'string',
            'max:45',
            'iunique:estado_disposicion,nombre,'.$this->request->get('id'),
        ];
        return $rules;
    }
}
