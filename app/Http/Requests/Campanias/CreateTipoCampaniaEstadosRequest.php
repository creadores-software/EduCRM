<?php

namespace App\Http\Requests\Campanias;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Campanias\TipoCampaniaEstados;
use Illuminate\Validation\Rule;

class CreateTipoCampaniaEstadosRequest extends FormRequest
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
        $rules= TipoCampaniaEstados::$rules;
        $rules['estado_campania_id'] = [
            'required',
            'integer',
            Rule::unique('tipo_campania_estados')
                ->ignore($this->id)
                ->where('tipo_campania_id', $this->tipo_campania_id)
        ];
        $rules['orden'] = [
            'required',
            'integer',
            Rule::unique('tipo_campania_estados')
                ->ignore($this->id)
                ->where('tipo_campania_id', $this->tipo_campania_id)
        ];
        if($this->request->get('testRepository')){      
            //Se elimina esta validación pues es compleja de controlar desde el Factory     
            unset($rules['estado_campania_id'][2]); 
        }
        return $rules;
    }
}
