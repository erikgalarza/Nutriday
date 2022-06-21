<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrarAdminRequest extends FormRequest
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
            "cedula"=>"required|string|min:10|max:10",
            "telefono"=>"required|string|min:10|max:10",
            "email"=>"required|email:rfc,dns|unique:users,email",
            "password"=>"required|string|min:8|max:40"
        ];
    }
}
