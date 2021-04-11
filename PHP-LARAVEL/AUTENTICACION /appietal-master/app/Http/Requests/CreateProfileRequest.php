<?php

namespace AppIetal\Http\Requests;

use AppIetal\Http\Requests\Request;

class CreateProfileRequest extends Request
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
          'numDoc'   => 'required|max:20|unique:profiles',
          'tipoDoc'    => 'required',
          'estracto'    => 'required|integer',
          'sisben'    => 'required',
          'sexo'    => 'required',
          'rh'    => 'required',
          'feNa'    => 'required|date',
         'direccion'    => 'required',
         'foto'    => 'required',
         'docFile'    => 'required',
         'epsFile'    => 'required',
         'sisbenFile'    => 'required',
        ];
    }
}
