<?php

namespace CompanyMainPage\Http\Requests;

use CompanyMainPage\Http\Requests\Request;

class StorePostRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'            => 'string|required',
            'category_id'     => 'alpha_num|required',
            'body_original'   => 'required',
            'cover_image' => 'image',
        ];
    }
}
