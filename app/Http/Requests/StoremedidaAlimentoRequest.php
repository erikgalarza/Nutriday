<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoremedidaAlimentoRequest extends FormRequest
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
            "medida"=>"required|string|min:1|max:20|unique:medida,medida",
            "abreviatura"=>"nullable|string|min:1|max:10|unique:medida,abreviatura"
        ];
    }
}
