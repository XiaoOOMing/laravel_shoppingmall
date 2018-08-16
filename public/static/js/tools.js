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
    }
};
