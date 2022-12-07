<?php

namespace App\Http\Requests;

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
        return [
            'title' => 'required|min:5',
            'slug' => 'required',
            'video' => 'required',
            'skill_id' => 'required',
            'language' => 'required',

            'content' => 'required|min:10',
            'description' => 'required|min:10',
            'image' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề',
            'title.min' => 'Số kí tự lớn hơn 5',
            'slug.required' => 'Vui lòng nhập đường dẫn',
            'video.required' => 'Vui lòng nhập video demo',
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
