@extends('book.layouts.base')

@section('title', '注册')

@section('content')
    <div class="weui-cells weui-cells_form" style="margin-top: 0">
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">邮箱</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input username" type="text" placeholder="请输入邮箱">
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">密码</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input password" type="password" placeholder="请输入密码">
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">确认密码</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input password-confirm" type="password" placeholder="请确认密码">
            </div>
        </div>
        <div class="weui-cell weui-cell_vcode">
            <div class="weui-cell__hd"><label class="weui-label">验证码</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input validate-code" type="text" placeholder="请输入验证码">
            </div>
            <div class="weui-cell__ft">
                <img class="weui-vcode-img" src="/service/validate_code" id="validateImage">
            </div>
        </div>
    </div>
    <div class="weui-cells weui-cells_form">
        <a href="javascript:;" class="weui-btn weui-btn_primary" id="regist">注册</a>
    </div>
    <div class="weui-cells_form" style="background-color: transparent; border: none;">
        <a href="/login" style="display: block; text-align: center; color: #1aad19">去登录</a>
    </div>
@endsection

@section('js')
    <script>
        $('#regist').click(function () {
            var url = "/service/register";
            var postData = {
                username: $('.username').val(),
                password: $('.password').val(),
                validatecode: $('.validate-code').val(),
                _token: _tools.csrf()
            };

            // 校验
            if (postData.username === '') {
                alert('请输入账号');
                return;
            }
            if (postData.password === '') {
                alert('请输入密码');
                return;
            }
            if (postData.password !== $('.password-confirm').val()) {
                alert('两次输入的密码不一致');
                return;
            }
            if (postData.validatecode === '') {
                alert('请输入图片验证码');
                return;
            }

            // 发送请求
            _tools.post(url, postData, function (res) {

            });
        });
    </script>
@endsection