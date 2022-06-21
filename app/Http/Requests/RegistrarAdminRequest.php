<?php

namespace App\Http\Requests;

use Illuminate\Validation\Factory as ValidationFactory;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Cedula;
class RegistrarAdminRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "nombre"=>"required|string|min:3|max:30",
            "cedula"=>["required", new Cedula()],
            "telefono"=>"required|string|min:10|max:10",
            "email"=>"required|email:rfc,dns|unique:users,email",
            "password"=>"required|string|min:8|max:40"
        ];
    }
}
