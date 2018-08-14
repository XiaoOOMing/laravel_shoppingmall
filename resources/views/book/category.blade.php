@extends('book.layouts.base')

@section('title', '书籍列表')

@section('content')
    <div class="weui-cells__title">请选择语言:</div>
    <div class="weui-cells">
        <div class="weui-cell weui-cell_select">
            <div class="weui-cell__bd">
                <select class="weui-select" name="parent-category" id="parentCategory">
                    @foreach($categorys as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="weui-cells__title">书籍分类:</div>
    <div class="weui-cells" id="childCategory">
        <a class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd">
                <p>Nodejs</p>
            </div>
            <div class="weui-cell__ft">
            </div>
        </a>
    </div>
@endsection

@section('js')
    <script src="{{ asset('static/js/category.js') }}"></script>
@endsection