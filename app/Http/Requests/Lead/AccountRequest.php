<?php

namespace App\Http\Requests\Lead;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
                    case 'forgotPassword':
                        $rules = [
                            "password" => "required",
                        ];
                        break;
                    case 'update':
                        $rules = [
                            "address" => "required",
                            "about_me" => "required",
                            "number_phone" => "required|digits:10|numeric",
                            "social_networks" => "required",
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
            'password.required' => 'Chưa nhập mật khẩu',
            'address.required' => 'Chưa nhập địa chỉ',
            'about_me.required' => 'Chưa nhập thông tin cơ bản',
            'number_phone.required' => 'Chưa nhập số điện thoại',
            'number_phone.digits' => 'Vui lòng nhập đúng số điện thoại',
            'social_networks.required' => 'Chưa có nền tảng mạng xã hội',
        ];
    }
}
