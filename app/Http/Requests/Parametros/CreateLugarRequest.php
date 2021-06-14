<?php

namespace App\Http\Requests\Parametros;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Parametros\Lugar;
use Illuminate\Validation\Rule;

class CreateLugarRequest extends FormRequest
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
        $rules= Lugar::$rules;
        if($this->request->get('tipo')!='P'){
            $rules['padre_id'] = [
                'required',
                'integer',
            ];
        }
        $rules['nombre'] = [
            'required',
            'string',
            'max:255',
            Rule::unique('lugar')
                ->ignore($this->id)
                ->where('padre_id', $this->padre_id)
        ];
        return $rules;
    }
}
