<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class VendedorRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'nombre' => ['required'],
            'apellidos' => ['required'],
            'telefono' => ['required', 'unique:vendedors,telefono'],
            'email' => ['required', 'unique:vendedors,email'],
            'sueldo' => ['required'],
            'foto' => ['nullable', 'image']
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio',
            'apellidos.required' => 'El campo apellidos es obligatorio',
            'telefono.required' => 'El campo telefono es obligatorio',
            'telefono.unique' => 'Ya existe ese teléfono en el sistema',
            'email.required' => 'El campo email es obligatorio',
            'email.unique' => 'Ya existe ese email en el sistema',
            'sueldo.required' => 'El campo sueldo es obligatorio',
            'foto.image' => 'El fichero debe ser de tipo imagen'
        ];
    }
}
