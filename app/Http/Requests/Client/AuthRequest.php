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
                            "password" => "required",
                            "re_password" => "required",
                        ];
                        break;
                    case 'handleLogin':
                        $rules = [
                            "email" => "required",
                            "password" => "required",
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
            'required' => 'Vui lòng nhập :attribute',
            'unique' => ':attribute đã tồn tại',
            'digits' => 'Vui lòng nhập đủ :attribute',
            'numeric' => 'Vui lòng nhập đúng :attribute',
        ];
    }
}
