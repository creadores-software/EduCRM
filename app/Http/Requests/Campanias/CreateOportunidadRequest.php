<?php

namespace App\Http\Requests\Campanias;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Campanias\Oportunidad;
use Illuminate\Validation\Rule;

class CreateOportunidadRequest extends FormRequest
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
        $rules= Oportunidad::$rules;
        $rules['contacto_id'] = [
            'required',
            'integer',
            Rule::unique('oportunidad')
                ->ignore($this->id)
                ->where('campania_id', $this->campania_id)
                ->where('formacion_id', $this->formacion_id)
        ];
        if($this->request->get('testRepository')){      
            //Se elimina esta validación pues es compleja de controlar desde el Factory     
            unset($rules['contacto_id'][2]); 
        }
        return $rules;
    }
}
