<?php

namespace App\Http\Requests\Contactos;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Contactos\Parentesco;
use App\Rules\UnicoAcudiente;
use Illuminate\Validation\Rule;

class CreateParentescoRequest extends FormRequest
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
        $rules= Parentesco::$rules;
        $rules['acudiente'] = [
            'nullable',
            'boolean',
            new UnicoAcudiente($this->request->get('id'),$this->request->get('contacto_origen')),
        ];
        $rules['contacto_destino'] = [
            'required',
            'integer',
            Rule::unique('parentesco')
                ->ignore($this->id)
                ->where('contacto_origen', $this->contacto_origen)
        ];
        if($this->request->get('testRepository')){      
            //Se elimina esta validación pues es compleja de controlar desde el Factory     
            unset($rules['contacto_destino'][2]); 
        }
        return $rules;
    }
}
