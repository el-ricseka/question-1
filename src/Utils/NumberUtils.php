<?php

namespace App\Utils;


class NumberUtils
{
    public static function truncateToDecimals($number, $precision): float
    {
        $factor = pow(10, $precision);
        return floor($number * $factor) / $factor;
    }
}