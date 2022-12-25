<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
        $rules = [];
        $currentAction = $this->route()->getActionMethod();
        switch ($this->method()):
            case 'POST':
                switch ($currentAction) {
                    case 'register':
                        $rules = [
                            "name" => "required|unique:users",
                            "email" => "required|unique:users",
                            "number_phone" => "required|digits:10|numeric",
                            "password" => "required|min:6|max:12",
                            "re_password" => "required|min:6|max:12",
                        ];
                        break;
                    case 'handleLogin':
                        $rules = [
                            "email" => "required",
                            "password" => "required",
                        ];
                        break;
                    case 'forgotPassword':
                        $rules = [
                            "email" => "required",
                        ];
                        break;
                    case 'handleChangePassword':
                        $rules = [
                            "password" => "required",
                            "re_password" => "required",
                        ];
                        break;
                }
                break;
            default:
                break;
        endswitch;
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'name.unique' => 'Tên đã tồn tại',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
            'password.max' => 'Mật khẩu tối thiểu 12 ký tự',
            're_password.required' => 'Vui lòng nhập lại mật khẩu',
            're_password.min' => 'Mật khẩu nhập lại tối thiểu 6 ký tự',
            're_password.max' => 'Mật khẩu nhập lại tối thiểu 12 ký tự',
            'number_phone.required' => 'Vui lòng nhập số điện thoại',
            'number_phone.digits' => 'Vui lòng nhập đủ độ dài 10 số',
            'number_phone.numeric' => 'Vui lòng nhập đúng định dạng số',
        ];
    }
}
