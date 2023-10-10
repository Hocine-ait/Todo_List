<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool //à mettre à true pour être fonctionnel
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Veuillez entrer un titre.',
            'title.max' => 'Le titre ne doit pas comporter plus de 255 caractères.',
        ];
    }
    
}
