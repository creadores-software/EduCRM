<?php

namespace App\Http\Requests\Campanias;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Campanias\Interaccion;

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
        //Si es diferente a planeación la fecha no se puede pasar al día actual
        if($this->request->get('estado_interaccion_id')<>2){
            $rules['fecha_inicio'] = ['required','before_or_equal:today'];      
            $rules['fecha_fin'] = ['required','before_or_equal:today'];     
        } 
        return $rules;
    }
}
