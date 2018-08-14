<?php

namespace App\Logics;

class Price
{
    public static function price_format($data, $col = 'price')
    {
        if (isset($data[$col])) {
            $data[$col] = number_format($data[$col] / 100, 2, '.', '');
        } else {
            foreach ($data as $k => $vo) {
                if (isset($vo[$col])) {
                    $data[$k][$col] = number_format($vo[$col] / 100, 2, '.', '');
                }
            }
        }
        return $data;
    }
}