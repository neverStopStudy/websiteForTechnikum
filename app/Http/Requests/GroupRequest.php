<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
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
            'name' => 'required|unique:groups|max:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Необхідно додати назву группи!',
            'name.unique'  => 'Така группа вже є!',
            'name.max'  => 'Перевищено максимальну кількість символів!'
        ];
    }
}
