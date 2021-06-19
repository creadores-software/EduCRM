<?php

namespace App\Http\Requests\Contactos;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Contactos\InformacionEscolar;
use Illuminate\Validation\Rule;

class UpdateInformacionEscolarRequest extends FormRequest
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
        $rules= InformacionEscolar::$rules;
        $rules['nivel_formacion_id'] = [
            'required',
            'integer',
            Rule::unique('informacion_escolar')
                ->ignore($this->id)
                ->where('contacto_id', $this->contacto_id)
                ->where('fecha_inicio', $this->fecha_inicio)
        ];
        $rules['fecha_grado'] = ['nullable'];
        if($this->request->get('fecha_grado')){
            $rules['fecha_grado'][] = 'after:fecha_inicio';                
        }
        $rules['fecha_icfes'] = ['nullable'];
        if($this->request->get('fecha_icfes')){
            $rules['fecha_icfes'][] = 'after:fecha_inicio';                
        }
        return $rules;
    }
}
