<?php

namespace App\Http\Requests;

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
            "name"=>"required|string|min:3|max:30",
            "apellido"=>"required|string|min:3|max:30",
            "tipo_diabetes"=>"required|numeric|size:1",
            "telefono"=>"required|numeric|size:10",
            "sexo"=>"required|string",
            "cedula"=>"required|string|min:10|max:10",
            "edad"=>"required|numeric",
            "email"=>"required|email:rfc,dns|unique:users,email",
            "password"=>"required|string|min:8|max:40"
        ];
    }
}
