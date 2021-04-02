<?php

namespace App\Http\Requests\Formaciones;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Formaciones\Periodicidad;

class UpdatePeriodicidadRequest extends FormRequest
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
        $rules = Periodicidad::$rules;
        
        return $rules;
    }
}
