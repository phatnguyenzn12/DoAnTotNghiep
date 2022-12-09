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
    public function rules()
    {
        $rules = [];
       
      //  $currentAction = $this->route()->getActionMethod();
        switch ($this->method()):
            case 'PUT':
              return  $rules = [
                    'time' => "required",
                    'video_path' => "required"
                ];
                break;
            default:
                # code...
                break;
        endswitch;
        return $rules;
    }
    public function messages()
    {
        return [
            'time.required' => "Chưa nhập time",
            'video_path.required' => "Chưa có video",
            'video_path.unique' => "Video đã tồn tại",


        ];
    }
}
