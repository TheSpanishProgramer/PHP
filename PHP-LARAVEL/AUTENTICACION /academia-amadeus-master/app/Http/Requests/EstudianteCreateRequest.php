<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteCreateRequest extends FormRequest
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
            'nombre' => 'required|max:30|String',
            'apellido' => 'required|max:30|String',
            'fecha_nacimiento' => 'required|Date',
            'correo' => 'required|email|max:255|unique:estudiante',
            'telefono' => 'required|String',
        ];
    }
}
