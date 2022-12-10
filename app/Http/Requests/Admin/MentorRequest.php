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
                            "years_in_experience" => "required|",
                            "cate_course_id" => "required",
                            "skills" => "required",
                            "specializations" => "required",
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
