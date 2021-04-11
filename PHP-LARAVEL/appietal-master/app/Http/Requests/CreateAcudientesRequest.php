<?php

namespace AppIetal\Http\Requests;

use AppIetal\Http\Requests\Request;

class CreateAcudientesRequest extends Request
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
            'nomAcudiente'    => 'required',
            'docAcudiente'    => 'required',
            'telAcudiente'    => 'required',
            'dirAcudiente'    => 'required',
        ];
    }
}
