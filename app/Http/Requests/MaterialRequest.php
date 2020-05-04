<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
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
            'name' => 'required|max:100|unique:materials|min:8',
            'text' => 'required|max:255|min:20',
            'link' => 'required',
            'subject_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Необхідно додати назву матеріалу!',
            'name.min' => 'Замала кількість символів назви матеріалу',
            'name.unique'  => 'Матеріал з такою назвою вже є!',
            'name.max'  => 'Перевищено максимальну кількість символів для заголовку!',
            'text.required' => 'Необхідно додати опис матеріалу!',
            'text.required' => 'Замала кількість символів опису матеріалу',
            'link.required' => 'Необхідно додати файл з навчальним матеріалом',
            'subject_id.required' => 'Необхідно обрати предмет до матеріалу!',
        ];
    }
    
}
