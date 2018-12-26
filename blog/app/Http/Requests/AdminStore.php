<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStore extends FormRequest
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
           'uname'=>'required|unique:admin|regex:/^[a-zA-Z]{1}[\w]{6,15}$/',
           'pwd'=>'required|regex:/^[\w]{6,15}$/',
           'repwd'=>'required|same:pwd',
           'tel'=>'required|regex:/^1{1}[3-9]{1}[0-9]{9}$/',
           'email'=>'email'
        ];
    }

    public function messages()
   {
       return [
        'uname.required' => '用户名不能为空',
        'uname.unique' => '用户名已存在',
        'uname.regex' => '用户名格式不正确',
        'pwd.required'  => '密码不能为空',
        'pwd.regex'  => '密码格式不正确',
        'repwd.same'  => '两次密码不一致',
        'repwd.required'  => '确认密码不能为空',
        'tel.required'  => '电话不能为空',
        'tel.regex'  => '电话格式不正确',
        'email.email'  => '邮箱格式不正确',
    ];
   }
}
