<?php

namespace App\Http\Controllers\Admin;

use App\Logics\Show;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // 登录视图
    public function index()
    {
        return view('admin.login');
    }

    // 登录程序
    public function login(Request $request)
    {
        // 验证验证码
        $data = $request->input();
        if ($request->session()->get('validate_code') !== $data['validate']) {
            return Show::show(0, '验证码错误');
        }

        // 验证账号密码
        $admin = Admin::where('username', $data['username'])->first();
        if (!$admin) {
            return Show::show(0, '帐号不存在');
        }
        if ($admin->password !== $data['password']) {
            return Show::show(0, '密码错误');
        }

        // 登录后，保存到session
        $request->session()->put('admin', $admin);

        // 返回信息
        return Show::show(1, '后台登录成功');
    }
}
