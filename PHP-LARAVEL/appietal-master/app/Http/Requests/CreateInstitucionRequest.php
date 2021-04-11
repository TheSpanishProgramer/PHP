<?php

namespace AppIetal\Http\Requests;

use AppIetal\Http\Requests\Request;

class CreateInstitucionRequest extends Request
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
          'sede'    => 'required',
          'jornada'    => 'required',
          'grado'    => 'required',
        ];
    }
}
