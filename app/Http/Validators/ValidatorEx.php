<?php
/**
 * 拡張バリデータ
 */
namespace App\Http\Validators;

use Customer;
use Illuminate\Validation\Validator;

/**
 * 拡張Validatorクラスです。
 *
 * @author Satoshi Nagashiba <bobtabo.buhibuhi@gmail.com>
 * @package App\Http\Validators
 */
class ValidatorEx extends Validator
{
    /**
     * 入力された場合の数値を検証します。
     *
     * @param $attribute 属性
     * @param $value 値
     * @param $parameters パラメータ
     * @return bool 検証結果
     */
    public function validateUniqueEmail($attribute, $value, $parameters): bool
    {
        //入力されていない場合は検証しない
        if (empty($value)) {
            return true;
        }

        return Customer::isUniqueEmail($value, $this->getValue('id'));
    }
}
