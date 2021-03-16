<?php
/**
 * 共通リクエスト
 */
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * 共通Requestクラスです。
 *
 * @author Satoshi Nagashiba <bobtabo.buhibuhi@gmail.com>
 * @package App\Http\Requests
 */
class AppRequest extends FormRequest
{
    /**
     * {@inheritdoc}
     */
    public function authorize()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function input($key = null, $default = null)
    {
        $values = parent::input($key, $default);
        unset($values['_token']);
        return $values;
    }

    /**
     * 検証ルールを取得します。
     *
     * @return array 検証ルール
     */
    public function rules()
    {
        return [];
    }

    /**
     * 検証エラーメッセージを取得します。
     *
     * @return array 検証エラーメッセージ
     */
    public function messages()
    {
        return [];
    }
}
