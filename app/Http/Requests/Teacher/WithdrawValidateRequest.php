<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class WithdrawValidateRequest extends FormRequest
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
                    case 'withdraw':
                        $rules = [
                            "money" => "required|integer|gt:0",
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
            'money.required' => 'Vui lòng nhập số tiền muốn rút',
            'money.integer' => 'Số tiền muốn rút phải là số',
            'money.gt' => 'Vui lòng nhập đúng số tiền muốn rút',
        ];
    }
}
