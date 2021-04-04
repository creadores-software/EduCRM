<?php

namespace App\Http\Requests\Contactos;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Contactos\Contacto;
use App\Models\Parametros\Origen;


class CreateContactoRequest extends FormRequest
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
        $rules= Contacto::$rules;
        $rules['identificacion'] = [               
            'string',
            'max:30',
            'iunique:contacto,identificacion,'.$this->request->get('id'),
        ];  
        if(!$this->request->get('esPariente')){
            $rules['identificacion'][] = 'nullable';   
        }
        if($this->request->get('origen_id')){
            $origen=Origen::find($this->request->get('origen_id'));
            if(!empty($origen)){
                if($origen->nombre=='Otro'){
                    $rules['otro_origen'] = ['required','string','max:45'];
                }else if($origen->nombre=='Pariente' || $origen->nombre=='Referido'){
                    $rules['referido_por'] = ['required','integer'];
                }
            }            
        }
        return $rules;
    }
}
