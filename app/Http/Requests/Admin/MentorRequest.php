<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MentorRequest extends FormRequest
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
                    case 'create':
                        $rules = [
                            "name" => "required|unique:mentors",
                            "email" => "required|unique:mentors",
                            "number_phone" => "required|digits:10|numeric",
                            "address" => "required",
                            "years_in_experience" => "required|gt:0|max:100",
                            "educations" => "required",
                            "cate_course_id" => "required",
                            "specializations" => "required",
                        ];
                        break;
                    case 'update':
                        $rules = [
                            "number_phone" => "required|digits:10|numeric",
                            "address" => "required",
                            "years_in_experience" => "required|gt:0|max:100",
                            "cate_course_id" => "required",
                            "specializations" => "required",
                        ];
                        break;
                }
                break;
            case 'PUT':
                switch ($currentAction) {
                    case 'update':
                        $rules = [
                            "number_phone" => "required|digits:10|numeric",
                            "address" => "required",
                            "years_in_experience" => "required|gt:0|max:100",
                            "cate_course_id" => "required",
                            "specializations" => "required",
                        ];
                        break;
                }
            default:
                break;
        endswitch;
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập họ tên',
            'name.unique' => 'Tên đã tồn tại',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại',
            'number_phone.required' => 'Vui lòng nhập số điện thoại',
            'number_phone.digits' => 'Vui lòng nhập đủ độ dài 10 số',
            'number_phone.numeric' => 'Vui lòng nhập đúng định dạng số',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'educations.required' => 'Vui lòng nhập giáo dục',
            'years_in_experience.required' => 'Vui lòng nhập kinh nghiệm',
            'years_in_experience.gt' => 'Vui lòng nhập năm kinh nghiệm phải lớn hơn 0',
            'years_in_experience.max' => 'Số năm kinh nghiệm tối đa là 100',
            'cate_course_id.required' => 'Vui lòng chọn danh mục khóa học',
            'specializations.required' => 'Vui lòng nhập chuyên môn',
        ];
    }
}
