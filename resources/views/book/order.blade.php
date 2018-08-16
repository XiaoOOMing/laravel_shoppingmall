@extends('book.layouts.base')

@section('title', '我的订单')

@section('content')
    @foreach($orders as $order)
        <div class="weui-form-preview" style="margin-bottom: 20px;">
            <div class="weui-form-preview__hd">
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label">付款金额</label>
                    <em class="weui-form-preview__value">¥{{ $order->price }}</em>
                </div>
            </div>
            <div class="weui-form-preview__bd">
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label">订单状态</label>
                    <span class="weui-form-preview__value">{{ \App\Logics\Order::status($order->status) }}</span>
                </div>
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label">创建时间</label>
                    <span class="weui-form-preview__value">{{ $order->created_at }}</span>
                </div>
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label">更新时间</label>
                    <span class="weui-form-preview__value">{{ $order->updated_at }}</span>
                </div>
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label">订单编号</label>
                    <span class="weui-form-preview__value">{{ $order->order_no }}</span>
                </div>
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label">商品信息：</label>
                </div>
                @foreach($order->order_item as $item)
                    <div onclick="window.location.href='/product/{{ $item->product_id }}'"
                         class="weui-form-preview__item" style="padding: 3px 0;">
                        <label class="weui-form-preview__label"
                               style="width: 200px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis; text-align-last: auto; font-weight: bold; color: #555;">{{ json_decode($item->product_info, true)['name'] }}</label>
                        <span class="weui-form-preview__value">
                    <span class="">￥{{ \App\Logics\Price::price_format(json_decode($item->product_info, true)['price']) }}</span>
                    x{{ $item->count }}
                </span>
                    </div>
                @endforeach
            </div>
            @switch($order->status)
                @case(0)
                <div class="weui-form-preview__ft">
                    <a class="weui-form-preview__btn weui-form-preview__btn_default delete-order"
                       data-id="{{ $order->id }}" href="javascript:">删除订单</a>
                    <a class="weui-form-preview__btn weui-form-preview__btn_primary"
                       href="/payment/{{ $order->order_no }}">去付款</a>
                </div>
                @break
                @case(1)
                <div class="weui-form-preview__ft">
                    <a class="weui-form-preview__btn weui-form-preview__btn_primary" href="javascript:" style="color: #999;">商家正在发货</a>
                </div>
                @break
                @case(2)
                <div class="weui-form-preview__ft">
                    <a class="weui-form-preview__btn weui-form-preview__btn_primary affirm-order" href="javascript:" data-id="{{ $order->id }}">确认收货</a>
                </div>
                @break
                @case(3)
                <div class="weui-form-preview__ft">
                    <a class="weui-form-preview__btn weui-form-preview__btn_primary" href="/comment_list/{{ $order->order_no }}">评价商品</a>
                </div>
                @break
            @endswitch
        </div>
    @endforeach
@endsection