<?php

namespace App\Http\Requests\Lead;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeacherValidateRequest extends FormRequest
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
                            "educations" => "required",
                            "years_in_experience" => "required",
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
            'name.max' => 'Số kí tự nhỏ hơn 100',
            'name.not_regex' => 'Tên không chứa các kí tự đặc biệt',
            'name.unique' => 'Tên đã tồn tại',

            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Đường dẫn đã tồn tại',

            'number_phone.required' => 'Vui lòng nhập số điện thoại',
            'number_phone.unique' => 'Số điện thoại đã tồn tại',

            'educations.required' => 'Vui lòng nhập giáo dục',
            'educations.not_regex' => 'Giáo dục không chứa các kí tự đặc biệt',

            'years_in_experience.required' => 'Vui lòng nhập số năm kinh nghiệm',

        ];
    }
}
