<?php

namespace App\Http\Requests\Entidades;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Entidades\Sector;

class UpdateSectorRequest extends FormRequest
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
        $rules= Sector::$rules;
        $rules['nombre'] = [
            'required',
            'string',
            'max:45',
            'iunique:sector,nombre,'.$this->request->get('id'),
        ];
        return $rules;
    }
}
