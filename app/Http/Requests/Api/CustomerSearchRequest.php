<?php
/**
 * 顧客検索リクエスト
 */
namespace App\Http\Requests\Api;

use App\Http\Requests\AppRequest;

/**
 * 顧客検索Requestクラスです。
 *
 * @author Satoshi Nagashiba <bobtabo.buhibuhi@gmail.com>
 * @package App\Http\Requests\Api
 */
class CustomerSearchRequest extends AppRequest
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            'last_kana' => 'max:50',
            'first_kana' => 'max:50',
        ];
    }
}
