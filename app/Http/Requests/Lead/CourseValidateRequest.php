<?php

namespace App\Http\Requests\Lead;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            case 'POST':
                switch ($currentAction) {
                    case 'store':
                        $rules = [
                            'title' => 'required', 'min:5', 'max:100', 'not_regex:/^.+@.+$/i',
                            'slug' => 'required', 'max:100', 'not_regex:/^.+@.+$/i',
                            'video' => 'required',
                            'skill_id' => 'required',
                            'language' => 'required',

                            'content' => 'required',
                            'description' => 'required',
                            'image' => 'required|image',
                        ];
                        break;
                }
                break;
            case 'PUT':
                switch ($currentAction) {
                    case 'update':
                        $rules = [
                            'title' => 'required', 'min:5', 'max:100', 'not_regex:/^.+@.+$/i',
                            'slug' => 'required', 'max:100', 'not_regex:/^.+@.+$/i',
                            'video' => 'required',
                            'skill_id' => 'required',
                            'language' => 'required',

                            'content' => 'required',
                            'description' => 'required',
                            'image' => 'image',
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
            'title.required' => 'Vui lòng nhập tiêu đề',
            'title.min' => 'Phải trên 5 ký tự',
            'title.max' => 'Phải dưới 100 ký tự',
            'title.not_regex' => 'Tiêu đề không được chứa chứa các kí tự đặc biệt',

            'slug.required' => 'Vui lòng nhập đường dẫn',
            'slug.max' => 'Số kí tự nhỏ hơn 100',
            'slug.not_regex' => 'Đường dẫn không chứa các kí tự đặc biệt',


            'video.required' => 'Vui lòng nhập video demo',

            'skill_id.required' => 'Vui lòng chọn kĩ năng',
            'language.required' => 'Vui lòng chọn ngôn ngữ',
            'content.required' => 'Vui lòng  nhập giới thiệu',
            'description.required' => 'Vui lòng nhập mô tả',
            'image.required' => 'Vui lòng chọn ảnh',
        ];
    }
}
