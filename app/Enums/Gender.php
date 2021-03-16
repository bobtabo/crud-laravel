<?php
/**
 * 性別Enum
 */
namespace App\Enums;

use MyCLabs\Enum\Enum;

/**
 * 性別Enumクラスです。
 *
 * @author Satoshi Nagashiba <bobtabo.buhibuhi@gmail.com>
 * @package App\Enums
 */
class Gender extends Enum
{
    const MEN = 1;
    const WOMEN = 2;
}
