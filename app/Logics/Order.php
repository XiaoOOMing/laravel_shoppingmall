<?php
/**
 * Created by PhpStorm.
 * User: Meckey_Shu
 * Date: 2018/8/15
 * Time: 13:22
 */

namespace App\Logics;


class Order
{
    public static function status($status)
    {
        $res = '未知状态';
        switch ($status) {
            case 0:
                $res = '待支付';
                break;
            case 1:
                $res = '商家已接单，火速发货中。';
                break;
            case 2:
                $res = '商家已发货，请留意物流信息。';
                break;
            case 3:
                $res = '亲，给个好评呗。';
                break;
            case 4:
                $res = '订单已完成，祝您生活愉快!';
                break;
        }
        return $res;
    }
}