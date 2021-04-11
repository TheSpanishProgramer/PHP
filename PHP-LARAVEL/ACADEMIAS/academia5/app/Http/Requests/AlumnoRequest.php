<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoRequest extends FormRequest
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
            'nombre'=>['required'],
            'apellidos'=>['required'],
            'mail'=>['required','unique:alumnos,mail'],
            'logo'=>['nullable','image']
        ];
    }

    /**
     * Get messages of validation's failures.
     *
     * @return array
     */
    public function messages()
    {
        return[
            'nombre.required'=>'El campo nombre es obligatorio',
            'apellidos.required'=>'El campo apellidos es obligatorio',
            'mail.required'=>'El campo email es obligatorio',
            'mail.unique'=>'Ya esxiste ese email en el sistema',
            'logo.image'=>'El fichero debe ser de tipo imagen'
        ];
    }
}
