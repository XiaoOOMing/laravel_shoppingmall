@extends('admin.layouts.inner_base')

@section('content')
    <form class="form form-horizontal">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>产品标题：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>描述/简介：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>价格(元)：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">分类：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span class="select-box">
                    <select class="select" id="category">
                        <option value="0">请选择</option>
                        @foreach($categorys as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
				</span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">二级分类：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span class="select-box">
                    <select class="select" id="subCategory">
                        <option>请选择</option>
                    </select>
				</span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>编辑内容：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <script id="container"></script>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script>
        // 初始化ueditor
        var ue = UE.getEditor('container');
        
        // 分类联动
        $('#category').on('change', function() {
            var pid = parseInt($(this).val());
            var postData = {_token: _tools.csrf()};
            var url = '/service/category/' + pid;
            if (pid === 0) {
                return;
            }
            _tools.post(url, postData, function (res) {
                var html = '';
                for (var i = 0; i < res.length; i ++) {
                    html += '<option value="'+ res[i]['id'] +'">'+ res[i]['name'] +'</option>';
                }
                $('#subCategory').empty().append(html);
            })
        });
    </script>
@endsection