<?php

namespace App\Http\Requests\Campanias;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Campanias\JustificacionEstadoCampania;
use Illuminate\Validation\Rule;

class UpdateJustificacionEstadoCampaniaRequest extends FormRequest
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
        $rules= JustificacionEstadoCampania::$rules;
        $rules['nombre'] = [
            'required',
            Rule::unique('justificacion_estado_campania')
                ->ignore($this->id)
                ->where('estado_campania_id', $this->estado_campania_id)
        ];
        return $rules;
    }
}
