<?php

namespace App\Http\Controllers\View;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // 登录页面
    public function index()
    {
        return view('book.login', ['referer' => $_SERVER['HTTP_REFERER']]);
    }
}
