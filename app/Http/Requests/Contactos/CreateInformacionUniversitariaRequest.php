<?php

namespace App\Http\Requests\Contactos;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Contactos\InformacionUniversitaria;
use Illuminate\Validation\Rule;

class CreateInformacionUniversitariaRequest extends FormRequest
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
        $rules= InformacionUniversitaria::$rules;
        $rules['formacion_id'] = [
            'required',
            'integer',
            Rule::unique('informacion_universitaria')
                ->ignore($this->id)
                ->where('contacto_id', $this->contacto_id)
        ];
        $rules['fecha_grado'] = ['nullable'];
        if($this->request->get('fecha_grado')){
            $rules['fecha_grado'][] = 'after:fecha_inicio';                
        }
        return $rules;
    }
}
