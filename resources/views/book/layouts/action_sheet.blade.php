<div>
    <div class="weui-mask" id="iosMask" style="display: none"></div>
    <div class="weui-actionsheet" id="iosActionsheet">
        <div class="weui-actionsheet__title">
            <p class="weui-actionsheet__title-text">
                @if(session('member'))
                    尊敬的
                    <span class="price">{{ json_decode(session('member'), true)['username'] }}</span>
                    <br>
                @else
                    <a href="/login" style="color: #666;">游客您好，您尚未登录。</a>
                    <br>
                @endif
                欢迎来到 XiaoOOMing 的书店!
            </p>
        </div>
        <div class="weui-actionsheet__menu">
            <div class="weui-actionsheet__cell" id="_category">书籍列表</div>
            <div class="weui-actionsheet__cell" id="_order">我的订单</div>
            <div class="weui-actionsheet__cell" id="_car">购物车</div>
            <div class="weui-actionsheet__cell" id="_logout">注销</div>
        </div>
        <div class="weui-actionsheet__action">
            <div class="weui-actionsheet__cell" id="iosActionsheetCancel">取消</div>
        </div>
    </div>
</div>