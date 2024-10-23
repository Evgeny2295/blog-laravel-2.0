<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string',
            'email'=>'required|email|unique:users',
            'role'=>'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо для заполнения',
            'name.string' => 'Это поле должно соответствовать строковому типу',
            'email.required'=> 'Это поле необходимо для заполнения',
            'email.email'=> 'Это поле необходимо должно быть формата ee@mail.ru',
            'email.unique'=> 'Это поле должно быть уникальным',
            'role.required'=>'Необходимо выбрать роль пользователя',
            'role.integer'=>'Поле должно соответствовать числовому значению',

        ];
    }
}
