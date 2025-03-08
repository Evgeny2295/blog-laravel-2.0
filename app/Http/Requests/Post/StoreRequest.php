<?php

namespace App\Http\Requests\Post;

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
            'title'=>'required|string',
            'content'=>'required|string',
            'main_image'=>'required|file',
            'category_id'=>'required|exists:categories,id',
            'tag_ids'=>'nullable|array',
            'tag_ids.*'=>'exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Это поле должно соответствовать строковому типу',
            'content.required' => 'Это поле необходимо для заполнения',
            'content.string' => 'Это поле должно соответствовать строковому типу',
            'main_image.required' => 'Это поле необходимо для заполнения',
            'main_image.file' => 'Это поле должно соответствовать файловому типу',
            'category_id.required'=>'Это поле необходимо для заполнения',
            'category_id.exists'=>'Id категории должен быть в дазе данных',
            'tags_ids.array'=>'Необходимо отправить массив данных',
            'tags_ids.exists'=>'Id тегов должен быть в дазе данных',
        ];
    }
}
