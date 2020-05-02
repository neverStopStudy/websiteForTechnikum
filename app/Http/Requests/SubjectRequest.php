<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
            'name' => 'required|unique:subjects|min:3|max:30',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Необхідно додати назву!',
            'name.unique'  => 'Такий предмет вже є!',
            'name.max'  => 'Перевищено максимальну кількість символів!',
            'name.max'  => 'Замала кількість символів!'
        ];
    }
}
