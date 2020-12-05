<?php

namespace App\Http\Requests\Parametros;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Parametros\ActividadOcio;

class CreateActividadOcioRequest extends FormRequest
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
        $rules= ActividadOcio::$rules;
        $rules['nombre'] = [
            'required',
            'string',
            'max:45',
            'iunique:actividad_ocio,nombre,'.$this->request->get('id'),
        ];
        return $rules;
    }
}
