@extends('book.layouts.base')

@section('title', '确认订单')

@section('content')
    <div class="weui-cells" style="margin-top: 0">
        @foreach($products as $product)
            <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                <div class="weui-media-box__hd">
                    <img class="weui-media-box__thumb"
                         src="{{ $product->info['preview'] }}"
                         alt="">
                </div>
                <div class="weui-media-box__bd" style="overflow: hidden">
                    <h4 class="weui-media-box__title">{{ $product->info['name'] }}</h4>
                    <p class="weui-media-box__desc">{{ $product->info['summary'] }}</p>
                </div>
                <div class="weui-cell__ft">
                    <p class="price">￥{{ $product->info['price'] }}</p>
                    <p>x{{ $product->count }}</p>
                </div>
            </a>
        @endforeach
    </div>
    <div class="weui-cells">
        <div class="weui-cell" style="font-size: 15px;">
            <div class="weui-cell__hd"><label class="weui-label">留言</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" placeholder="选填：给卖家留言">
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__bd"></div>
            <div class="weui-cell__ft" style="font-size: 14px;">
                共 <span class="orange">{{ $count }}</span> 件商品，合计：<span class="price">{{ $order->price }}</span>
            </div>
        </div>
    </div>
    <footer class="pay_footer">
        <div class="weui-cells weui-cell_swiped" style="margin-top: 0">
            <div class="weui-cell__bd" style="transform: translateX(-110px); font-size: 16px">
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <p></p>
                    </div>
                    <div class="weui-cell__ft">
                        共 <span class="orange">{{ $count }}</span> 件商品，合计：<span class="price">{{ $order->price }}</span>
                    </div>
                </div>
            </div>
            <div class="weui-cell__ft">
                <a id="payNow" data-order="{{ $order->order_no }}" class="weui-swiped-btn weui-swiped-btn_warn" href="javascript:" style="width: 100px; text-align: center; padding: 10px 0;">提交订单</a>
            </div>
        </div>
    </footer>
@endsection()