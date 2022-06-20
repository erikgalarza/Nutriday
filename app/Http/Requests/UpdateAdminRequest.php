<?php

namespace App\Http\Requests;

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
            "nombre"=>"string|min:3|max:30",
            "cedula"=>"string|min:10|max:10",
            "telefono"=>"string|min:10|max:10",
            "email"=>"email:rfc,dns",
            // "password"=>"string|min:8|max:40"
        ];
    }
}
