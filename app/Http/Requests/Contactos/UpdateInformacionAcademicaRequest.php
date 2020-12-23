<?php

namespace App\Http\Requests\Contactos;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Contactos\InformacionAcademica;
use Illuminate\Validation\Rule;

class UpdateInformacionAcademicaRequest extends FormRequest
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
        $rules= InformacionAcademica::$rules;
        $rules['formacion_id'] = [
            'required',
            'integer',
            Rule::unique('informacion_academica')
                ->ignore($this->id)
                ->where('contacto_id', $this->contacto_id)
        ];
        return $rules;
    }
}
