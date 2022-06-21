<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Http\Traits\ValidadorEc;

class Cedula implements Rule
{
    

    use ValidadorEc;
    public function passes($attribute, $value)
    {
        if($this->validarCedula($value))
            return true;
        return false;
    }

   
    public function message()
    {

        return 'Cedula no valida';
    }
}
