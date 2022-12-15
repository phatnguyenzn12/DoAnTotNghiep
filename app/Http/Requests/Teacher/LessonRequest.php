<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
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
    public function attributes()
    {
        return [
            'video_path' => 'video',
          
        ];
    }
    public function rules()
    {
        $rules = [];
        switch ($this->method()):
            case 'PUT':
                return  $rules = [
                    // 'time' => "required",
                    'video_path' => "required | mimes:mp4,mov,ogg,qt | max:200000"

                ];
                break;
            default:
                break;
        endswitch;
        return $rules;
    }
    public function messages()
    {
        return [
            'required' => 'Bạn chưa thêm :attribute ',
            'mimes' => ':attribute Chưa đúng định dạng đuôi file là: mp4,,mov,ogg,qt',
            'max' => ":attribute Nhập quá 100kb"
        ];
    }
}
