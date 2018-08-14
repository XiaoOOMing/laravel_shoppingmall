@extends('book.layouts.base')

@section('title', $title)

@section('content')
    <div class="weui-panel">
        <div class="weui-panel__bd">
            @foreach($products as $product)
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="{{ $product->preview }}">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">{{ $product->name }}</h4>
                        <p class="weui-media-box__desc">{{ $product->summary }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection