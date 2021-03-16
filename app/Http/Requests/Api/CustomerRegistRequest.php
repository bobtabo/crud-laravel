<?php
/**
 * 顧客登録リクエスト
 */
namespace App\Http\Requests\Api;

use App\Http\Requests\AppRequest;

/**
 * 顧客登録Requestクラスです。
 *
 * @author Satoshi Nagashiba <bobtabo.buhibuhi@gmail.com>
 * @package App\Http\Requests\Api
 */
class CustomerRegistRequest extends AppRequest
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            'last_name' => 'required|max:50',
            'first_name' => 'required|max:50',
            'last_kana' => 'required|max:50',
            'first_kana' => 'required|max:50',
            'gender' => 'required',
            'post_code' => ['required', 'regex:/^[0-9]{3}-[0-9]{4}$/'],
            'address' => 'required|max:80',
            'building' => 'nullable|max:80',
            'email' => 'required|max:80|email|unique_email',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function messages()
    {
        return [
            'email.unique_email' => 'メールアドレスは既に登録されています。',
        ];
    }
}
