<?php

namespace App\Http\Requests\Formaciones;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Formaciones\Formacion;
use Illuminate\Validation\Rule;

class UpdateFormacionRequest extends FormRequest
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
        $rules= Formacion::$rules;        
        $rules['nombre'] = [
            'required',
            'string',
            'max:150',
            Rule::unique('formacion')
                ->ignore($this->id)
                ->where('entidad_id', $this->entidad_id)
                ->where('codigo_snies', $this->codigo_snies)
        ];
        $rules['codigo_snies'] = [
            'nullable',
            'integer',
            Rule::unique('formacion')
                ->ignore($this->id)
        ];
        return $rules;
    }
}
