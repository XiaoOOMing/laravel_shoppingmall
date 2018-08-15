@extends('book.layouts.base')

@section('title', '评价订单')

@section('content')
    <div class="weui-cells__title">宝贝评价：</div>
    <div class="weui-cells">
        <div class="weui-cell">
            <div class="weui-cell__bd">
                <textarea class="weui-textarea" placeholder="宝贝满足你的期待吗？说说你的使用心得，分享给大家吧。" rows="3"></textarea>
                <div class="weui-textarea-counter"><span>0</span>/200</div>
            </div>
        </div>
    </div>
    <div class="weui-cells__title">打个分呗：</div>
    <div class="weui-cells" style="padding: 20px 10px;">
        <div class="weui-slider-box">
            <div class="weui-slider">
                <div id="sliderInner" class="weui-slider__inner">
                    <div id="sliderTrack" style="width: 100%;" class="weui-slider__track"></div>
                    <div id="sliderHandler" style="left: 100%;" class="weui-slider__handler"></div>
                </div>
            </div>
            <div id="sliderValue" class="weui-slider-box__value">100</div>
        </div>
    </div>
    <div class="weui-cells">
        <a href="javascript:;" class="weui-btn weui-btn_primary" id="submitComment" data-order="{{ $order_no }}" data-pid="{{ $product_id }}">提交评价</a>
    </div>
@endsection