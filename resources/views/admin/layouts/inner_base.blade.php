<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta name="csrf" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/static/huiadmin/lib/webuploader/0.1.5/webuploader.css"/>
    <link rel="stylesheet" type="text/css" href="/static/huiadmin/static/h-ui/css/H-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="/static/huiadmin/static/h-ui.admin/css/H-ui.admin.css"/>
    <link rel="stylesheet" type="text/css" href="/static/huiadmin/lib/Hui-iconfont/1.0.8/iconfont.css"/>
    <link rel="stylesheet" type="text/css" href="/static/huiadmin/static/h-ui.admin/skin/default/skin.css" id="skin"/>
    <link rel="stylesheet" type="text/css" href="/static/huiadmin/static/h-ui.admin/css/style.css"/>
    @yield('css')
    <title>我的桌面</title>
    <style>
        #container {
            min-height: 500px;
        }
    </style>
</head>
<body>
<div class="page-container">
    @yield('content')
</div>
@include('admin.layouts.footer')
<script src="/static/js/tools.js"></script>
@yield('js')
</body>
</html>
