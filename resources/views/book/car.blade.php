@extends('book.layouts.base')

@section('title', '购物车')

@section('content')
    <div class="weui-cells weui-cells_checkbox" style="margin-top: 0;">
        @foreach($car as $item)
            <label class="weui-cell weui-check__label" for="{{ $item->product->id }}">
                <div class="weui-cell__hd">
                    <input type="checkbox" class="weui-check car-check" id="{{ $item->product->id }}"
                           @if($item->checked == 1) checked @endif>
                    <i class="weui-icon-checked"></i>
                </div>
                <a href="/product/{{ $item->product->id }}" class="weui-media-box noborder weui-media-box_appmsg"
                   style="padding: 0; overflow: hidden;">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="{{ $item->product->preview }}">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title" style="font-size: 14px; margin-bottom: 5px;">{{ $item->product->name }}</h4>
                        <p class="weui-media-box__desc" style="font-size: 13px;">{{ $item->product->summary }}</p>
                    </div>
                </a>
                <div class="weui-cell__ft" style="padding-left: 10px;">
                    <p class="price" style="font-size: 14px;">￥{{ $item->product->price }}</p>
                    <p>x{{ $item->count }}</p>
                </div>
            </label>
        @endforeach
    </div>
    @include('book.layouts.car_footer')
@endsection

@section('js')
    <script>
        // 保存购物车选中状态
        $('.car-check').on('change', function () {
            var url = "/service/car/check";
            var checked = $(this).is(':checked') ? 1 : 0;
            var id = $(this).attr('id');
            var postData = {_token: _tools.csrf(), id: id, checked: checked};
            _tools.post(url, postData, function (res) {
                $('#total').html(res.data.total);
            });
        });
    </script>
@endsection