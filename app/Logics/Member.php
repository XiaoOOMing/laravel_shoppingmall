<?php
/**
 * Created by PhpStorm.
 * User: Meckey_Shu
 * Date: 2018/8/14
 * Time: 13:32
 */

namespace App\Logics;



class Member
{
    public static function member($request)
    {
        return $request->session()->get('member');
    }
}