var _tools = {
    post: function (url, postData, success) {
        $.ajax({
            url:url,
            type:'POST',
            data:postData,
            dataType:'JSON',
            success: success,
            error: function () {
                console.error('系统错误');
            }
        })
    },
    csrf: function () {
        return $('meta[name="csrf"]').attr('content');
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
