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
    //  * Determine if the user is authorized to make this request.
    //  */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    // /**
    //  * Get the validation rules that apply to the request.
    //  *
    //  * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
    //  */
    // public function rules(): array
    // {
    //     return [
    //         //
    //     ];
    // }
}
