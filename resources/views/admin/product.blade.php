@extends('admin.layouts.inner_base')

@section('content')
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <span class="l">
            <a href="javascript:;" onclick="addProduct()" class="btn btn-primary radius">添加产品</a>
        </span>
        <span class="r">共有数据：<strong>54</strong> 条</span>
    </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort">
            <thead>
            <tr class="text-c">
                <th width="40">ID</th>
                <th width="60">缩略图</th>
                <th width="100">产品名称</th>
                <th>描述</th>
                <th width="100">单价</th>
                <th width="60">发布状态</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr class="text-c va-m">
                    <td>{{ $product->id }}</td>
                    <td><a href="javascript:;"><img width="60" class="product-thumb" src="{{ $product->preview }}"></a></td>
                    <td class="text-l">{{ $product->name }}</td>
                    <td class="text-l">{{ $product->summary }}</td>
                    <td><span class="price">{{ $product->price }}</span></td>
                    <td class="td-status"><span class="label label-success radius">已发布</span></td>
                    <td class="td-manage">
                        <a style="text-decoration:none" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>
                        <a style="text-decoration:none" class="ml-5" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
                        <a style="text-decoration:none" onclick="deleteProduct({{ $product->id }})" class="ml-5" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script>
        $('.table-sort').dataTable({
            "aaSorting": [[ 0, "asc" ]],//默认第几个排序
            "aoColumnDefs": [
                {"orderable":false,"aTargets":[1,2,3,5,6]}// 制定列不参与排序
            ]
        });

        function addProduct() {
            var index = layer.open({
                type: 2,
                title: '添加产品',
                content: '/admin/product/add',
                area: ['100%', '100%'],
            });
            layer.full(index)
        }

        function deleteProduct(id) {
            layer.confirm('确认删除？', {}, function () {
                var url = '/admin/product/delete';
                var postData = {_token: _tools.csrf(), id: id};
                _tools.post(url, postData, function() {
                    window.location.reload();
                });
            });
        }
    </script>
@endsection
