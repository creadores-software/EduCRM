<?php

namespace App\Http\Requests\Formaciones;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Formaciones\PeriodoAcademico;

class UpdatePeriodoAcademicoRequest extends FormRequest
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
        $rules= PeriodoAcademico::$rules;
        $rules['nombre'] = [
            'required',
            'string',
            'max:45',
            'iunique:periodo_academico,nombre,'.$this->request->get('id'),
        ];
        $rules['fecha_fin'] = ['nullable'];
        if($this->request->get('fecha_fin') && $this->request->get('fecha_inicio')){
            $rules['fecha_fin'][] = 'after:fecha_inicio';                
        }
        return $rules;
    }
}
