<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStore extends FormRequest
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
            'uname'=>'required|unique:user|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
            'pwd'=>'required|regex:/^[\w]{6,18}$/',
            'repwd'=>'required|same:pwd',
            'sex'=>'required',
            'face'=>'required',
            'tel'=>'required|regex:/^[1]{1}[3-9]{1}[0-9]{9}$/',
            'email'=>'required|email',
        ];
    }

    public function messages()
    {
        return [
            'uname.required'=>'用户名不能为空',
            'uname.regex'=>'用户名格式不正确',
            'uname.unique'=>'用户名已存在',
            'pwd.required'=>'密码不能为空',
            'repwd.same'=>'确认密码与密码不一致，请重新输入',
            'face.required'=>'头像不能为空',
            'tel.required'=>'手机号不能为空',
            'tel.regex'=>'手机号格式不正确',
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱格式不正确',
        ];
    }



}
