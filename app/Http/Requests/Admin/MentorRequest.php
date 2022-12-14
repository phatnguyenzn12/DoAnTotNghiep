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
            'name.required' => 'Vui l??ng nh???p h??? t??n',
            'name.unique' => 'T??n ???? t???n t???i',
            'email.required' => 'Vui l??ng nh???p email',
            'email.unique' => 'Email ???? t???n t???i',
            'number_phone.required' => 'Vui l??ng nh???p s??? ??i???n tho???i',
            'number_phone.digits' => 'Vui l??ng nh???p ????? ????? d??i 10 s???',
            'number_phone.numeric' => 'Vui l??ng nh???p ????ng ?????nh d???ng s???',
            'address.required' => 'Vui l??ng nh???p ?????a ch???',
            'educations.required' => 'Vui l??ng nh???p gi??o d???c',
            'years_in_experience.required' => 'Vui l??ng nh???p kinh nghi???m',
            'years_in_experience.gt' => 'Vui l??ng nh???p n??m kinh nghi???m ph???i l???n h??n 0',
            'years_in_experience.max' => 'S??? n??m kinh nghi???m t???i ??a l?? 100',
            'cate_course_id.required' => 'Vui l??ng ch???n danh m???c kh??a h???c',
            'specializations.required' => 'Vui l??ng nh???p chuy??n m??n',
        ];
    }
}
