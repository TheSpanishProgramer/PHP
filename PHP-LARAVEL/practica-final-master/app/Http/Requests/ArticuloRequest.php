<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticuloRequest extends FormRequest
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
            'nombre' => ['required'],
            'modelo' => ['required'],
            'precio' => ['required'],
            'stock' => ['required'],
            'detalles' => ['required'],
            'foto' => ['nullable', 'image'],
            'categoria_id' => ['nullable']
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio',
            'modelo.required' => 'El campo modelo es obligatorio',
            'precio.required' => 'El campo precio es obligatorio',
            'stock.required' => 'El campo stock es obligatorio',
            'detalles.required' => 'El campo detalles es obligatorio',
            'foto.image' => 'El fichero debe ser de tipo imagen'
        ];
    }
}
