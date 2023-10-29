<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\StoreTodoRequest;

class UpdateTodoRequest extends StoreTodoRequest
{
    /**
     *  一旦、継承しているので、特に変更はしない。
     * 変更が必要であれば、オーバーライド or 独自のメソッドを定義
     */

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
