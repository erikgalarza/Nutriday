<?php

namespace App\Http\Requests;

use App\Rules\Cedula;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
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
            "cedula"=>["required", new Cedula()],
            "telefono"=>"required|string|min:10|max:10",
            "email"=>"required|email:rfc,dns",
            "password"=>"nullable|string|min:8|max:40"
        ];
    }
}
