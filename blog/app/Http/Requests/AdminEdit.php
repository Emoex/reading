<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminEdit extends FormRequest
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
           'tel'=>'required|regex:/^1{1}[3-9]{1}[0-9]{9}$/',
           'email'=>'email'
        ];
    }

    public function messages()
{
    return [
        'tel.required'  => '电话不能为空',
        'tel.regex'  => '电话格式不正确',
        'email.email'  => '邮箱格式不正确',
    ];
}
}


