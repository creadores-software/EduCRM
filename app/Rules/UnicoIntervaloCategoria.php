<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Campanias\CategoriaOportunidad;

class UnicoIntervaloCategoria implements Rule
{
    private $request;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($request)
    {
       $this->request=$request;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if($value){
            $cantidad = CategoriaOportunidad::where('id','<>',intval($this->request->get('id')))
                ->where('interes_minimo','<=',intval($this->request->get('interes_minimo')))
                ->where('interes_maximo','>=',intval($this->request->get('interes_maximo')))
                ->where('capacidad_minima','<=',intval($this->request->get('capacidad_minima')))
                ->where('capacidad_maxima','>=',intval($this->request->get('capacidad_maxima')))
                ->count();
            if($cantidad>0){
               return false;
            }
           return true;
       }
       return true; 
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Ya existe otra categoría que contiene este intervalo.';
    }
}
