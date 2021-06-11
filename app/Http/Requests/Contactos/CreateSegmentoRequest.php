<?php

namespace App\Http\Requests\Contactos;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Contactos\Segmento;
use Illuminate\Validation\Rule;

class CreateSegmentoRequest extends FormRequest
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
        $rules= Segmento::$rules;
        $rules['nombre'] = [
            'required',
            'string',
            'max:100',
            Rule::unique('segmento')
                ->where('usuario_id', $this->usuario_id)
                ->ignore($this->id)
        ];
        return $rules;
    }
}
