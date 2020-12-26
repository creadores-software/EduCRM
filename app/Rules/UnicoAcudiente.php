<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Contactos\Parentesco;

class UnicoAcudiente implements Rule
{
    private $id;
    private $contacto;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id,$contacto)
    {
       $this->id=$id;
       $this->contacto=$contacto;
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
            $cantidad = Parentesco::where('id','<>',intval($this->id))
                ->where('contacto_origen','=',intval($this->contacto))
                ->where('acudiente','=',1)->count();
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
        return 'Ya existe otro pariente marcado como acudiente.';
    }
}
