<?php

namespace CompanyMainPage\Http\Requests;

use CompanyMainPage\Http\Requests\Request;

class StoreContactInfoRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'            => 'string|required',
            'email'     => 'string|required',
            'contact_content'   => 'required',
        ];
    }
}
