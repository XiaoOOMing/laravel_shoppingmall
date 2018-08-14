@extends('book.layouts.base')

@section('title', '登录')

@section('content')
    <div class="weui-cells weui-cells_form" style="margin-top: 0">
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">账号</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input username" type="text" placeholder="请输入账号">
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">密码</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input password" type="password" placeholder="请输入密码">
            </div>
        </div>
        <div class="weui-cell weui-cell_vcode">
            <div class="weui-cell__hd"><label class="weui-label">验证码</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="number" placeholder="请输入验证码">
            </div>
            <div class="weui-cell__ft">
                <img class="weui-vcode-img" src="/service/validate_code" id="validateImage">
            </div>
        </div>
    </div>
    <div class="weui-cells weui-cells_form">
        <a href="javascript:;" class="weui-btn weui-btn_primary">登录</a>
    </div>
    <div class="weui-cells_form" style="background-color: transparent; border: none;">
        <a href="/register" style="display: block; text-align: center; color: #1aad19">没有账号？立即注册！</a>
    </div>
@endsection