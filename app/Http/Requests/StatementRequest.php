<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'phone' => 'required|digits:11'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Необходимо ввести имя',
            'surname.required' => 'Необходимо ввести фамилию',
            'phone.required' => 'Необходимо ввести номер телефона',
            'name.max' => 'Поле имя превышает :max символов',
            'surname.max' => 'Поле фамилии превышает :max символов',
            'phone.digits' => 'Поле поле Телефона должно состоять из 11 цифр',
        ];
    }
}
