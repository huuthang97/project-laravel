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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|min:6',
            'password' => 'required|min:6'
        ];
    }

    public function messages(){
        return [
            'email.required' => 'Tài khoản không được trống!',
            'email.min' => 'Tài khoản từ 6 ký tự trở lên!',
            'password.required' => 'Mật khẩu không được trống!',
            'password.min' => 'Mật khẩu từ 6 ký tự trở lên!',
        ];
        
    }
}
