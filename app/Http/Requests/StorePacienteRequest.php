<?php

namespace App\Http\Requests;

use App\Rules\Cedula;
use Illuminate\Foundation\Http\FormRequest;

class StorePacienteRequest extends FormRequest
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
        return [
            "nombre"=>"required|string|min:3|max:30",
            "apellido"=>"required|string|min:3|max:30",
            "tipo_diabetes"=>"required|integer",
            "telefono"=>"required|string|min:10|max:10",
            "sexo"=>"required|string",
            "cedula"=>["required", new Cedula()],
            "edad"=>"required|numeric",
            "email"=>"required|email:rfc,dns|unique:users,email",
            "password"=>"required|string|min:8|max:40"
        ];
    }
}
