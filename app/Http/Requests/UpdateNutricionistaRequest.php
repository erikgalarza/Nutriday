<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNutricionistaRequest extends FormRequest
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
            "nombre"=>"string|min:3|max:30",
            "apellido"=>"string|min:3|max:30",
            "cedula"=>"numeric|size:10",
            "sexo"=>"numeric|size:1",
            "telefono"=>"numeric|size:10",
            "especialidad"=>"string|max:40",
            "email"=>"email:rfc,dns",
            // "password"=>"string|min:8|max:40"
        ];
    }
}
