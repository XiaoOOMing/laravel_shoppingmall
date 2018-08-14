<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('static/weui/dist/style/weui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/book.css') }}">
    @yield('css')
</head>
<body>

@include('book.layouts.nav')

<div class="page-content">
    @yield('content')
</div>

@include('book.layouts.action_sheet')

@include('book.layouts.to_top')

<script src="{{ asset('static/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('static/js/book.js') }}"></script>

@yield('js')
</body>
</html>