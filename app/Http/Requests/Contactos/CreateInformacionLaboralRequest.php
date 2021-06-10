<?php

namespace App\Http\Requests\Contactos;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Contactos\InformacionLaboral;
use Illuminate\Validation\Rule;

class CreateInformacionLaboralRequest extends FormRequest
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
        $rules= InformacionLaboral::$rules;
        $rules['fecha_fin'] = ['nullable'];
        if($this->request->get('fecha_fin')){
            $rules['fecha_fin'][] = 'after:fecha_inicio';                
        }
        $rules['entidad_id'] = [
            'required',
            'integer',
            Rule::unique('informacion_laboral')
                ->where('contacto_id', $this->contacto_id)
                ->where('fecha_inicio', $this->fecha_inicio)
        ];
        return $rules;
    }
}
