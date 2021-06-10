<?php

namespace App\Http\Requests\Parametros;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Parametros\Prefijo;
use Illuminate\Validation\Rule;

class CreatePrefijoRequest extends FormRequest
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
        $rules= Prefijo::$rules;
        $rules['nombre'] = [
            'required',
            'string',
            'max:45',
            Rule::unique('prefijo')
                ->where('genero_id', $this->genero_id)
                ->ignore($this->id)
        ];
        return $rules;
    }
}
