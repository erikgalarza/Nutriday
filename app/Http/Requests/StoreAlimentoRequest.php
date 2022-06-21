<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlimentoRequest extends FormRequest
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
            "peso"=>"required|numeric|between:0,1000",
            "valor_calorico"=>"required|numeric|between:0,1000",
            "carbohidrato"=>"required|numeric|between:0,1000",
            "proteina"=>"required|numeric|between:0,1000",
            "grasa"=>"required|numeric|between:0,1000",
            "categoria"=>"required|integer|unique:alimentos,categoria_id",
            "medida"=>"required|integer|unique:alimentos,medida_id",
        ];
    }
}
