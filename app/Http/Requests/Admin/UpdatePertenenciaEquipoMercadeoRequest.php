<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Admin\PertenenciaEquipoMercadeo;
use Illuminate\Validation\Rule;

class UpdatePertenenciaEquipoMercadeoRequest extends FormRequest
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
        $rules= PertenenciaEquipoMercadeo::$rules;
        $rules['users_id'] = [
            'required',
            Rule::unique('pertenencia_equipo_mercadeo')
                ->ignore($this->id)
                ->where('equipo_mercadeo_id', $this->equipo_mercadeo_id)
        ];
        return $rules;
    }
}
