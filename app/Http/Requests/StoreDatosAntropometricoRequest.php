<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDatosAntropometricoRequest extends FormRequest
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

    public function rules()
    {
        return [
            "altura"=>"required|numeric|between:1,2.5",//mts
            "peso"=>"required|numeric|between:30,350",//kgs
            // "imc"=>"required",
            // "paciente_id"=>"",
            "grasa_corporal"=>"required|numeric|between:2,40",
            "masa_muscular"=>"required|numeric|between:20,70",
            "observaciones"=>"nullable|string|max:500",
            //mm == 35,45
            //gc = 2 , 40
        ];
    }
}
