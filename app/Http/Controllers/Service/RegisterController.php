<?php

namespace App\Http\Controllers\Service;

use App\Logics\Show;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    // 新用户注册
    public function regist(Request $request)
    {
        $data = $request->input();

        // 验证账号是否存在
        if (Member::where('email', $data['username'])->first()) {
            return Show::show(0, '邮箱已存在');
        }

        // 验证码验证
        if ($request->session()->get('validate_code') != $data['validatecode']) {
            return Show::show(0, '图片验证码错误');
        }

        // 新增用户
        $member = new Member();
        $member->username = $data['username'];
        $member->password = md5($data['password']);
        $member->email = $data['username'];
        $member->save();

        // 清空验证码session
        $request->session()->forget('validate_code');

        // 登录
        $request->session()->put('member', $member);

        // 返回信息
        return Show::show(1, '注册成功');
    }
}
