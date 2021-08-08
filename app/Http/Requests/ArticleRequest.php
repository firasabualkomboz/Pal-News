<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => 'required|String|unique:articles',
            'content' => 'required',
            'photo' => 'required|image',
            'tag' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'title.required'          => 'Please Enter a Title in The Field',
            'title.unique'   => 'The Title Already Exists',
        ];
    }

}
