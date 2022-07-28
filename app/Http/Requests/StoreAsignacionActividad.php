<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAsignacionActividad extends FormRequest
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
            "duracion.*"=>"required|string",
            "actividad_id.*"=>"required",
            "prioridad_id.*"=>"required",
        ];
    }

    public function messages()
    {
        return [
        'duracion.*.required' => 'La duración es requerida',
        'actividad_id.*.required' => 'La actividad es requerida',
        'prioridad_id.*.required' => 'La prioridad es requerida',
        ];
    }
}
