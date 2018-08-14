@extends('book.layouts.base')

@section('title', '书籍列表')

@section('content')
    <div class="weui-cells__title">请选择语言:</div>
    <div class="weui-cells">
        <div class="weui-cell weui-cell_select">
            <div class="weui-cell__bd">
                <select class="weui-select" name="select1">
                    <option value="1">PHP</option>
                    <option value="1">Java</option>
                    <option value="1">C++</option>
                </select>
            </div>
        </div>
    </div>

    <div class="weui-cells__title">书籍分类:</div>
    <div class="weui-cells">
        <a class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd">
                <p>Nodejs</p>
            </div>
            <div class="weui-cell__ft">
            </div>
        </a>
        <a class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd">
                <p>ThinkPHP</p>
            </div>
            <div class="weui-cell__ft">
            </div>
        </a>
        <a class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd">
                <p>SpringMVC</p>
            </div>
            <div class="weui-cell__ft">
            </div>
        </a>
    </div>
@endsection