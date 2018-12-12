<?php

namespace Modules\Greentest\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreatebusinessRequest extends BaseFormRequest
{
    public function rules()
    {
        return [];
    }

    public function translationRules()
    {
        return [
            'title'=>'required|min:2',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }

    public function translationMessages()
    {
        return [
            'title.required' => trans('greentest::businesses.messages.title is required'),
            'title.min' => trans('greentest::businesses.messages.min 2'),
        ];
    }
}
