<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTodoRequest extends FormRequest
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
            'title' => 'required|string|max:20',
            'due_date' => 'required|date|after_or_equal:today',
        ];
    }

    /**
     * :attributeを翻訳して定義
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'title' => 'タイトル',
            'due_date' => '締切日',
        ];
    }

    /**
     * 定義されているバリデーションルールのエラーメッセージを翻訳
     * @return array<string>
     */
    public function messages(): array
    {
        return [
            'due_date.after_or_equal' => ':attributeには本日以降の日付を入力してください。',
        ];
    }
}
