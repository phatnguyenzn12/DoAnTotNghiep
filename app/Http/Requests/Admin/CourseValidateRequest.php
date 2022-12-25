<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CourseValidateRequest extends FormRequest
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
            case 'PUT':
                switch ($currentAction) {
                    case 'update':
                        $rules = [
                            "price" => "required|gt:0",
                            "discount" => "max:100",
                            "percentage_pay" => "required|gt:0|max:75",
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
            'price.required' => 'Vui lòng nhập giá khóa học',
            'price.gt' => 'Giá khóa học không được là số âm',
            'discount.max' => 'Phần trăm giảm giá không được quá 100%',
            'percentage_pay.required' => 'Vui lòng nhập phần trăm trả giảng viên',
            'percentage_pay.gt' => 'Phần trăm trả giảng viên phải lớn hơn 0',
            'percentage_pay.max' => 'Phần trăm trả giảng viên không được quá 75%',
            'unique' => ':attribute đã tồn tại',
        ];
    }
}
