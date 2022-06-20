<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePacienteRequest extends FormRequest
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
            "name"=>"string|min:3|max:30",
            "apellido"=>"string|min:3|max:30",
            "tipo_diabetes"=>"numeric|size:1",
            "telefono"=>"string|min:10|max:10",
            "sexo"=>"string",
            "cedula"=>"string|min:10|max:10",
            "edad"=>"numeric",
            "email"=>"email:rfc,dns",
            // "password"=>"string|min:8|max:40"
        ];
    }
}
