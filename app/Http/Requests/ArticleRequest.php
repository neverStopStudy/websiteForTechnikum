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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'text' => 'required',
            'image_link' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Необхідно додати заголовок!',
            'text.required'  => 'Необхідно додати текст статті!',
            'image_link.required'  => 'Необхідно додати фото до статі!'
        ];
    }
}
