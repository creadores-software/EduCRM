<?php

namespace App\Http\Requests\Formaciones;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Formaciones\Formacion;

class UpdateFormacionRequest extends FormRequest
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
        $rules = Formacion::$rules;
        
        return $rules;
    }
}
