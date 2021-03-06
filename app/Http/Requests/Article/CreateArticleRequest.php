<?php

namespace App\Http\Requests\Article;

use App\Http\Requests\Request;

class CreateArticleRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title' => 'required | max:20',
            'publish_at' => 'required',
            'content' => 'required',
            'html_content' => 'required'
        ];
        return $rules;
    }
}
