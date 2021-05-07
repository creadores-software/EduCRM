<?php

namespace App\Http\Requests\Campanias;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Campanias\Campania;

class CreateCampaniaRequest extends FormRequest
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
        $rules= Campania::$rules;
        $rules['fecha_final'] = ['nullable'];
        if($this->request->get('fecha_final')){
            $rules['fecha_final'][] = 'after:fecha_inicio';                
        }
        return $rules;
    }
}
