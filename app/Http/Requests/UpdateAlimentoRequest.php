<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAlimentoRequest extends FormRequest
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
            "peso"=>"numeric|between:0,1000",
            "valor_calorico"=>"numeric|between:0,1000",
            "carbohidrato"=>"numeric|between:0,1000",
            "proteina"=>"numeric|between:0,1000",
            "grasa"=>"numeric|between:0,1000",
            "categoria"=>"integer",
            "medida"=>"integer",
        ];
    }
}
