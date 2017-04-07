<?php

namespace CompanyMainPage\Http\Requests;

use CompanyMainPage\Http\Requests\Request;

class StoreUserRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
//            'real_name'            => 'string|min:2',
//            'github_id'       => 'unique:users',
//            'wechat_unionid'  => 'string|unique:users',
//            'wechat_openid'   => 'string',
//            'weibo_id'        => 'string|unique:users',
//            'email'           => 'email|unique:users',
//            'image_url'       => 'url',
        ];
    }
}
