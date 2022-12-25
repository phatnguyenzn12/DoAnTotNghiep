<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
                            "title" => "required|unique:banners",
                            "content" => "required",
                            "image" => "required",
                            "discount_code_id" => "required",
                        ];
                        break;
                    case 'update':
                        $rules = [
                            "title" => "required",
                            "content" => "required",
                            "discount_code_id" => "required",
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
            'title.unique' => 'Tiêu đề đã tồn tại',
            'content.required' => 'Vui lòng nhập nội dung',
            'image.required' => 'Vui lòng nhập hình ảnh',
            'discount_code_id.required' => 'Vui lòng chọn mã giảm giá',
        ];
    }
}
