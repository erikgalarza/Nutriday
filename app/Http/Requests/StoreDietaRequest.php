<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDietaRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "nombre"=>"required|string|min:3|max:30",
            "tipo_diabetes"=>"required|integer",
            "fecha_fin"=>"required|date",
            "observaciones"=>"nullable|string|max:500",
        ];
    }
}
