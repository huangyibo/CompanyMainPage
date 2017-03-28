<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

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
