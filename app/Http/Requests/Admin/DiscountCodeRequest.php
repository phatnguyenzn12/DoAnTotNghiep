<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DiscountCodeRequest extends FormRequest
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
                    case 'store':
                        $rules = [
                            "title" => "required|unique:discount_codes",
                            "slug" => "required|not_regex:/^.+@.+$/i",
                            "code" => "required",
                            "discount" => "required|integer|gt:0|max:100",
                            "start_time" => "required",
                            "end_time" => "required|",
                            "content" => "required",
                        ];
                        break;
                    case 'update':
                        $rules = [
                            "title" => "required",
                            "slug" => "required",
                            "code" => "required",
                            "discount" => "required|integer|gt:0|max:100",
                            "start_time" => "required",
                            "end_time" => "required|",
                            "content" => "required",
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
            'integer' => ':attribute phải là số',
            'gt' => ':attribute phải lớn hơn 0',
            'max' => ':attribute không được quá 100%',
            'digits' => ':attribute không được quá 3 số',
        ];
    }
}
