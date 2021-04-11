<?php

namespace AppIetal\Http\Requests;

use AppIetal\Http\Requests\Request;

class CreateUserRequest extends Request
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
        'nombre'   => 'required|max:255|string',
        'email'    => 'required|email|max:255|unique:users',
        'password' => 'required|confirmed|min:6',
      ];
    }
}
