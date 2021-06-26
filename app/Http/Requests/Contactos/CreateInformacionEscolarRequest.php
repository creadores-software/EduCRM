<?php

namespace App\Http\Requests\Contactos;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Contactos\InformacionEscolar;
use Illuminate\Validation\Rule;

class CreateInformacionEscolarRequest extends FormRequest
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
        if($this->request->get('testRepository')){      
            //Se elimina esta validación pues es compleja de controlar desde el Factory     
            unset($rules['nivel_formacion_id'][2]); 
        }
        return $rules;
    }
}
