@extends('book.layouts.base')

@section('title', '待评价商品')

@section('content')
    <div class="weui-cells" style="margin-top: 0">
        <div class="weui-panel__bd">
            @foreach($order_item as $item)
                <div href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb"
                             src="{{ json_decode($item->product_info, true)['preview'] }}"/>
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">{{ json_decode($item->product_info, true)['name'] }}</h4>
                        <p class="weui-media-box__desc">
                            售价：
                            <span class="price">￥{{ \App\Logics\Price::price_format(json_decode($item->product_info, true)['price']) }}</span>
                            数量：<span class="orange">x{{ $item->count }}</span>
                        </p>
                    </div>
                    <div class="weui-cell__ft">
                        @if($item->status == 0)
                            <a href="/comment/{{ $order_no }}/{{ $item->product_id }}" style="color: #0bb20c;">评价</a>
                        @else
                            <a href="javascript:;" style="color: #666;">已评价</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection