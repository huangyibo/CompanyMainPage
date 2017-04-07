<?php

namespace CompanyMainPage\Http\Requests;

use CompanyMainPage\Http\Requests\Request;

class UpdatePasswordRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password'   => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ];
    }
}
