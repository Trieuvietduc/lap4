<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    // key là name của các input value là cá điều liện
    public function rules()
    {
        return [
            'email'=>'required|email|min:6|max:32',
            'password'=>'required|min:6'
        ];
    }
    public function messages()
    {
        return [
            'email.required'=> 'email không đucợ để trống',
            'email.email'=> 'email không đúng định dạng',
            'email.min'=> 'email tối thiểu 6 ký tự',
            'email.max'=> 'email tối đa 32 ký tự',
            'password.required'=>'mật khẩu bắt buộc nhập',
            'password.min'=>'mật khẩu tối thiểu 6 ký tự',
        ];
    }
}
