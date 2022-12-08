<?php

namespace App\Http\Requests;

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
        return [
            'title' => ['required', 'min:5','max:100','not_regex:/^.+@.+$/i',Rule::unique('courses')->ignore($this->id)],
            'slug' => ['required','min:3','max:100','not_regex:/^.+@.+$/i',Rule::unique('courses')->ignore($this->id)],
            'video' => ['required',Rule::unique('courses')->ignore($this->id)],
            'skill_id' => 'required',
            'language' => 'required',

            'content' => 'required|min:10"',
            'description' => 'required|min:10',
            'image' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề',
            'title.min' => 'Số kí tự lớn hơn 5',
            'title.max' => 'Số kí tự nhỏ hơn 100',
            'title.not_regex' => 'Tiêu đề không chứa các kí tự đặc biệt',
            'title.unique' => 'Tiêu đề đã tồn tại',

            'slug.required' => 'Vui lòng nhập đường dẫn',
            'slug.min' => 'Số kí tự lớn hơn 3',
            'slug.max' => 'Số kí tự nhỏ hơn 100',
            'slug.not_regex' => 'Đường dẫn không chứa các kí tự đặc biệt',
            'slug.unique' => 'Đường dẫn đã tồn tại',

            'video.required' => 'Vui lòng nhập video demo',
            'video.unique' => 'Video demo đã tồn tại',

            'skill_id.required' => 'Vui lòng chọn kĩ năng',
            'language.required' => 'Vui lòng chọn ngôn ngữ',
            'content.required' => 'Vui lòng  nhập giới thiệu',
            'content.min' => 'Số kí tự lớn hơn 10',
            'description.required' => 'Vui lòng nhập mô tả',
            'description.min' => 'Số kí tự lớn hơn 10',
            'image.required' => 'Vui lòng chọn ảnh',

        ];
    }
}
