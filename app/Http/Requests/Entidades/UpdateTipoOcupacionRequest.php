<?php

namespace App\Http\Requests\Entidades;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Entidades\TipoOcupacion;

class UpdateTipoOcupacionRequest extends FormRequest
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
        $rules = TipoOcupacion::$rules;
        
        return $rules;
    }
}
