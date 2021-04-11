<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateProfesorRequest extends Request
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
            'name'     =>  'required',
            'apellidos'  =>  'required',
            'dni'     =>  'required|size:9',
            'cp'     =>  'required|size:5',
            'poblacion'     =>  'required',
            'provincia'     =>  'required',
            'tfijo'   =>  'required|size:9',
            'movil'   =>  'required|size:9'
        ];
    }
}
