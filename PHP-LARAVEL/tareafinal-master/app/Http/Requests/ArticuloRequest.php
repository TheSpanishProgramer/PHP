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
    public function prepareForValidation(){
        if($this->nombre!=null){
            $this->merge([
                'nombre'=>ucwords($this->nombre)
            ]);
        }
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->method()=='PUT'){
            return [
            'nombre'=>['required', 'unique:articulos,nombre,'.$this->articulo->id],
            'pvp'=>['required'],
            'stock'=>['required'],
            'imagen'=>['nullable','image'],
            'categoria_id'=>['nullable']   
        ];
        }else{
            return [
                'nombre'=>['required', 'unique:articulos,nombre'],
                'pvp'=>['required'],
                'stock'=>['required'],
                'imagen'=>['nullable','image'],
                'categoria_id'=>['nullable']       
            ];
        }
    }

    public function messages(){
        return [
            'nombre.required'=>"El campo nombre es obligatorio",
            'nombre.unique'=>"Ya existe ese articulo en el sistema",
            'pvp.required'=>"El campo precio es obligatorio",
            'stock.required'=>"El campo stock es obligatorio"
        ];

    }
}
