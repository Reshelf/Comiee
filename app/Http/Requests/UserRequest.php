<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

// 作品投稿画面や作品更新画面から送信された作品タイトルや作品本文のバリデーション
class UserRequest extends FormRequest
{
    /**
     * リクエストの対象となるリソース(ここでは作品)をユーザーが更新して良いかどうかを判定
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * バリデーションのルール
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'alpha_num', 'min:3', 'max:16', Rule::unique('users')->ignore($this->user->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user->id)],
            'body' => 'required|max:200',
        ];
    }

    // バリデーションエラーメッセージに表示される項目名をカスタマイズ
    public function attributes()
    {
        return [
            'name' => '名前',
            'email' => 'メールアドレス',
            'body' => '自己紹介',
        ];
    }
}
