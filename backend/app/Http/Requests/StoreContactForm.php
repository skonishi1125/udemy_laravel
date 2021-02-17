<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactForm extends FormRequest
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
            // 'formのname' => '必須,20文字以上の文字列'
            'your_name' => 'required|string|max:20',
            'title' => 'required|string|max:50',
            // usersテーブルの中でユニークであるかどうか（被らないか!)
            'email' => 'required|email|unique:users|max:255',
            // nullable : nullでも可
            'url' => 'url|nullable',
            'gender' => 'required',
            'age' => 'required',
            'contact' => 'required|string|max:200',
            // accept : チェックしているかどうか
            'caution' => 'required\accepted',
        ];
    }
}
