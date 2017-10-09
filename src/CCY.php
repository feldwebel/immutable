<?php

use Currency\Rub;
use Currency\Usd;

class CCY
{
    public static function RUB(int $val): Immutable
    {
        return new Rub($val);
    }

    public static function USD(int $val): Immutable
    {
        return new Usd($val);
    }
}