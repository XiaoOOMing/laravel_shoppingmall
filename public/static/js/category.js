$(function () {
    var parent = $('#parentCategory');
    var child = $('#childCategory');

    function getChildCategory() {
        var pid = parent.val();
        var url = "/service/category/" + pid;
        var postData = {pid: pid, _token: _tools.csrf()};
        _tools.post(url, postData, function (res) {
            var html = '';
            for (x in res) {
                var item = '<a class="weui-cell weui-cell_access" href="/products/' + res[x]['id'] + '"><div class="weui-cell__bd"><p>' + res[x]['name'] + '</p></div><div class="weui-cell__ft"></div></a>';
                html += item;
            }
            child.empty().append(html);
        });
    }

    getChildCategory();
    parent.on('change', getChildCategory);
});