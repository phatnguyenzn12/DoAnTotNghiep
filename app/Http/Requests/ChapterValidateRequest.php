<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChapterValidateRequest extends FormRequest
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
            'number' => 'required',
            'mentor_id' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề',
            'title.min' => 'Số kí tự lớn hơn 5',
            'number.required' => 'Vui lòng nhập số bài học',
            'mentor_id.required'=> 'Vui lòng chọn Giảng viên',

        ];
    }
}
