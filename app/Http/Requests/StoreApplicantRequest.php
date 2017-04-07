<?php

namespace CompanyMainPage\Http\Requests;

use CompanyMainPage\Http\Requests\Request;

class StoreApplicantRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'post_id'  => 'alpha_num|required',
            'name'     => 'string|required|min:2',
            'email'   => 'email|required',
            'phone'   => 'string|required',
        ];
    }
}
