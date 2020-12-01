<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Entidades\Entidad;

class UnicaEntidadMarcada implements Rule
{
    private $id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id)
    {
       $this->id=$id;
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
             $cantidad = Entidad::where('id','<>',intval($this->id))->where('mi_universidad','=',1)->count();
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
        return 'Ya existe otra entidad marcada como "Mi Universidad"';
    }
}
