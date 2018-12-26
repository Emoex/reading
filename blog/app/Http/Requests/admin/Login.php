<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class Login extends FormRequest
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
           'uname'=>'required',
           'pwd'=>'required',
        ];
    }

    public function messages()
   {
       return [
        'uname.required' => '用户名不能为空',
        'pwd.required'  => '密码不能为空',
    ];
   }
}
