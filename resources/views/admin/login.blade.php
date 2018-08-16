@extends('admin.layouts.inner_base')

@section('css')
    <link href="/static/huiadmin/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <input type="hidden" id="TenantId" name="TenantId" value=""/>
    <div class="header"></div>
    <div class="loginWraper">
        <div id="loginform" class="loginBox">
            <form class="form form-horizontal" action="index.html" method="post">
                <div class="row cl">
                    <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
                    <div class="formControls col-xs-8">
                        <input name="" type="text" placeholder="账户" class="input-text size-L" id="username">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
                    <div class="formControls col-xs-8">
                        <input name="" type="password" placeholder="密码" class="input-text size-L" id="password">
                    </div>
                </div>
                <div class="row cl">
                    <div class="formControls col-xs-8 col-xs-offset-3">
                        <input id="validate" class="input-text size-L" type="text" placeholder="验证码"
                               onblur="if(this.value==''){this.value='验证码:'}"
                               onclick="if(this.value=='验证码:'){this.value='';}" value="验证码:" style="width:150px;">
                        <img src="/service/validate_code" id="validateCodeImg"> <a id="kanbuq" href="javascript:;">看不清，换一张</a></div>
                </div>
                <div class="row cl">
                    <div class="formControls col-xs-8 col-xs-offset-3">
                        <label for="online">
                            <input type="checkbox" name="online" id="online" value="">
                            使我保持登录状态</label>
                    </div>
                </div>
                <div class="row cl">
                    <div class="formControls col-xs-8 col-xs-offset-3">
                        <input name="" type="button" class="btn btn-success radius size-L"
                               value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;" id="submit">
                        <input name="" type="reset" class="btn btn-default radius size-L"
                               value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="footer">Copyright XiaOOMing书店 by H-ui.admin v3.1</div>
@endsection

@section('js')
    <script>
        // 更换验证码
        $('#kanbuq').on('click', function () {
            var url = '/service/validate_code?id=' + parseInt(Math.random() * 5000);
            $('#validateCodeImg').attr('src', url);
        });

        // 登录
        $('#submit').on('click', function () {
            var postData = {
                username: $('#username').val(),
                password: $('#password').val(),
                validate: $('#validate').val(),
                _token: _tools.csrf()
            };
            console.log(postData);
            var url = '/admin/login';

            _tools.post(url, postData, function (res) {
                if (res.status === 1) {
                    window.location.href = '/admin'
                } else {
                    alert(res.message)
                }
            })
        });
    </script>
@endsection
