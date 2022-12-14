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
            'title.required' => 'Vui l??ng nh???p ti??u ?????',
            'title.min' => 'Ph???i tr??n 5 k?? t???',
            'title.max' => 'Ph???i d?????i 100 k?? t???',
            'title.not_regex' => 'Ti??u ????? kh??ng ???????c ch???a ch???a c??c k?? t??? ?????c bi???t',

            'slug.required' => 'Vui l??ng nh???p ???????ng d???n',
            'slug.max' => 'S??? k?? t??? nh??? h??n 100',
            'slug.not_regex' => '???????ng d???n kh??ng ch???a c??c k?? t??? ?????c bi???t',


            'video.required' => 'Vui l??ng nh???p video demo',

            'skill_id.required' => 'Vui l??ng ch???n k?? n??ng',
            'language.required' => 'Vui l??ng ch???n ng??n ng???',
            'content.required' => 'Vui l??ng  nh???p gi???i thi???u',
            'description.required' => 'Vui l??ng nh???p m?? t???',
            'image.required' => 'Vui l??ng ch???n ???nh',
        ];
    }
}
