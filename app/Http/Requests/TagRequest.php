<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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


    public function rules()
    {
        return [
            'tag' => 'required|String|unique:tags'
        ];
    }

    public function messages()
    {
        return [
            'tag.required'          => 'Please Enter a Tag in The Field',
            'tag.unique'   => 'The Tag Already Exists',
        ];
    }

}
