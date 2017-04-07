<?php

namespace CompanyMainPage\Http\Requests;

use CompanyMainPage\Http\Requests\Request;

class EditAvatarRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'avatar'   => 'required',
        ];
    }
}
