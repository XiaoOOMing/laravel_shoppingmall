<?php
/**
 * Created by PhpStorm.
 * User: Meckey_Shu
 * Date: 2018/8/14
 * Time: 13:19
 */

namespace App\Logics;


class Show
{
    public static function show($status, $message, $data = [])
    {
        $res = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
        return json_encode($res);
    }
}