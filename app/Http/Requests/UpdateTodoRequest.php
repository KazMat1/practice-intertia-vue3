<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTodoRequest extends FormRequest
{
    // /**
    //  * Get the validation rules that apply to the request.
    //  *
    //  * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
    //  */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:20',
            'due_date' => 'required|date|after_or_equal:today',
            'is_completed' => 'required',
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
            'is_completed' => '完了/未完了',
        ];
    }
}
