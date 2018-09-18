@extends('admin.layouts.inner_base')

@section('content')
    <form class="form form-horizontal">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>产品标题：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="name" name="">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>描述/简介：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="summary" name="">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>价格(元)：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="price" name="">
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
            <label class="form-label col-xs-4 col-sm-2">产品图片：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div id="uploader-demo">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list"></div>
                    <div id="filePicker">选择图片</div>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>编辑内容：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <script id="container"></script>
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <button id="submit" class="btn btn-primary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 提交产品</button>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script>
        // 提交产品
        $('#submit').on('click', function () {
            var postData = {
                _token: _tools.csrf(),
                name: $('#name').val(),
                summary: $('#summary').val(),
                price: $('#price').val(),
                subCategory: $('#subCategory').val(),
                images: images,
                content: ue.getContent()
            };
            var url = '/admin/product/add';
            _tools.post(url, postData, function (res) {
                alert('添加成功');
                parent.window.location.reload();
                parent.layer.closeAll();
            });
        });

        // 初始化ueditor
        var ue = UE.getEditor('container');

        // 初始化webuploder
        var images = [];
        var uploader = WebUploader.create({
            auto: true,
            swf: '/static/huiadmin/lib/webuploader/0.1.5/Uploader.swf',
            server: '/admin/uploader',
            pick: '#filePicker',
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            }
        });

        // 缩略图
        // 当有文件添加进来的时候
        uploader.on( 'fileQueued', function( file ) {
            var $li = $(
                '<div id="' + file.id + '" class="file-item thumbnail">' +
                '<img>' +
                '<div class="info">' + file.name + '</div>' +
                '</div>'
                ),
                $img = $li.find('img');
            $('#fileList').append( $li );
            uploader.makeThumb( file, function( error, src ) {
                if ( error ) {
                    $img.replaceWith('<span>不能预览</span>');
                    return;
                }
                $img.attr( 'src', src );
            }, 100, 100 );
        });

        // 上传完毕，接收地址
        uploader.on('uploadAccept', function (obj, ret) {
            images.push(ret.data.filename);
            console.log(images);
        });
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
