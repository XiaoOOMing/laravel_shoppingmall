@extends('book.layouts.base')

@section('title', '产品详情')

@section('css')
    <link rel="stylesheet" href="{{ asset('static/swiper/dist/css/swiper.min.css') }}">
@endsection

@section('content')
    @if(count($product_images) > 0)
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($product_images as $product_image)
                    <div class="swiper-slide">
                        <img src="{{ $product_image->url }}">
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    @endif

    <div class="weui-panel" style="margin-top: 0">
        <div class="weui-media-box weui-media-box_text">
            <h4 class="weui-media-box__title" style="white-space: normal">{{ $product->name }}</h4>
            <p class="weui-media-box__desc">{{ $product->summary }}</p>
            <ul class="weui-media-box__info">
                <li class="weui-media-box__info__meta">售价：<span class="price">￥{{ $product->price }}</span></li>
            </ul>
        </div>
    </div>

    @if ($product_content)
        <article class="weui-panel weui-article" style="padding-bottom: 60px">{!! $product_content->content !!}</article>
    @endif

    @include('book.layouts.detail_footer')
@endsection

@section('js')
    <script src="{{ asset('static/swiper/dist/js/swiper.min.js') }}"></script>
    <script>_tools.swiper();</script>
@endsection