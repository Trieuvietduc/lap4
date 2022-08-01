<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:32',
            'username' => 'required',
            'birthday' => 'required|date',
            'phone' => 'required',
            'avatar' => 'file|required',
            'password' => 'required|min:6',
            
            'password_confirmation' => 'required|same:password|min:6'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'tên không được để trống',
            'email.required' => 'email không được để trống',
            'email.email' => 'email không đúng định dạng',
            'email.unique' => 'email đã được sử dụng',
            'password.required' => 'mật khẩu không được để trống',
            'password.min' => 'mật khẩu từ 6 ký tự trở lên',
            'password.max' => 'mật khẩu dưới 32 ký tự',
            'username.required' => 'username không đucợ để trống',
            'birthday.required' => 'birthday không được để trống',
            'birthday.date' => 'birthday k đúng định dạng',
            'phone.required' => 'sdt không được để trống',
            'avatar.file' => 'avatar phải là 1 file ảnh',
            'avatar.required' => 'avatar không được để trống',
            'password_confirmation.required' => 'nhập lại mật khẩu k đucợ để trống',
            'password_confirmation.same' => 'mật khẩu 2 phải giống mk 1',
            'password_confirmation.min' => 'mật khẩu 2 trên 6 ký tự',
        ];
    }
}
