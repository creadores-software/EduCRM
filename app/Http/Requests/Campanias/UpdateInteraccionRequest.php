<?php

namespace App\Http\Requests\Campanias;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Campanias\Interaccion;
use Illuminate\Validation\Rule;

class UpdateInteraccionRequest extends FormRequest
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
        $rules = Interaccion::$rules;
        $fecha_inicio = date('Y-m-d H:i:s',strtotime($this->fecha_inicio));        
        $rules['oportunidad_id'] = [
            'required',
            Rule::unique('interaccion')
                ->ignore($this->id)
                ->where('fecha_inicio',$fecha_inicio)
                ->where('users_id', $this->users_id)
        ];
        return $rules;
    }
}
