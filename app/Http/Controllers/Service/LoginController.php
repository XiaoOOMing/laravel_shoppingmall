<?php

namespace App\Http\Controllers\Service;

use App\Logics\Show;
use App\Models\Member;
use App\Tools\Validatecode\Validatecode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // 返回图片验证码
    public function validate_code(Request $request)
    {
        $code = new Validatecode();
        $res = $code->doImg();
        $request->session()->put('validate_code', $code->getCode());
        $code->getCode();
        return $res;
    }

    // 登录
    public function login(Request $request)
    {
        // 验证验证码是否正确
        $data= $request->input();
        if ($request->session()->get('validate_code') != $data['validatecode']) {
            return Show::show(0, '验证码错误');
        }

        // 验证帐号密码是否正确
        $member = Member::where('email', $data['username'])->first();
        if (!$member) {
            return Show::show(0, '邮箱不存在');
        }
        if ($member->password != md5($data['password'])) {
            return Show::show(0, '密码错误');
        }

        // 登录
        $request->session()->put('member', $member);

        // 清空验证码
        $request->session()->forget('validate_code');

        // 返回成功信息
        return Show::show(1, '登录成功');
    }

    // 注销
    public function logout(Request $request)
    {
        $request->session()->forget('member');
        return Show::show(1, 'ok');
    }
}
