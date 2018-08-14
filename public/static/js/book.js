var _tools = {
    post: function (url, postData, success) {
        // 发送post方法
        $.ajax({
            url: url,
            type: 'POST',
            data: postData,
            dataType: 'JSON',
            success: success,
            error: function () {
                console.error('系统错误');
            }
        })
    },
    csrf: function () {
        // 获取csrf
        return $('meta[name="csrf"]').attr('content');
    },
    swiper: function () {
        // 初始化默认swiper
        var mySwiper = new Swiper('.swiper-container', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
            }
        });
        return mySwiper;
    }
};

// 点击菜单 显示菜单
$(function () {
    var $iosActionsheet = $('#iosActionsheet');
    var $iosMask = $('#iosMask');

    function hideActionSheet() {
        $iosActionsheet.removeClass('weui-actionsheet_toggle');
        $iosMask.fadeOut(200);
    }

    $iosMask.on('click', hideActionSheet);
    $('#iosActionsheetCancel').on('click', hideActionSheet);
    $("#showIOSActionSheet").on("click", function () {
        $iosActionsheet.addClass('weui-actionsheet_toggle');
        $iosMask.fadeIn(200);
    });
});

// 返回顶部
$(function () {
    $(document).on('scroll', function () {
        var h = $(document).scrollTop();
        if (h > 200) {
            $('.to-top').show()
        } else {
            $('.to-top').hide()
        }
    });
    var toTop = $('.to-top');
    toTop.on('click', function () {
        window.scrollTo(0, 0);
    });
});
