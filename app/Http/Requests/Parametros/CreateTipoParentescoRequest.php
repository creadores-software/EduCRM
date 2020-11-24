<?php

namespace App\Http\Requests\Parametros;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Parametros\TipoParentesco;

class CreateTipoParentescoRequest extends FormRequest
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
        return TipoParentesco::$rules;
    }
}