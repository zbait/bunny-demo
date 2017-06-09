//初始化
$(function() {
    var user = new User();
    user.init();
    $('#save').click(user.save);
    $('#reset').click(user.reset);
    $('#cancel').click(user.home);
});
//用户类
function User() {
    var self = this;
    var id = null;
    //编辑页面获取用户数据
    this.init = function(){
        self.id = self.getQueryString('id');
        if(!self.id){
            return;
        }
        self.ajax('/user/query', {'id': self.id}, function(data){
            console.log(data);
            $('#username').val(data.user.username);
            $('#password').val(data.user.password);
            $('#mail').val(data.user.mail);
            $('#tel').val(data.user.tel);
        });
    };

    //保存行为
    this.save = function() {
        var data = {
            'id': self.id,
            'username': $('#username').val(),
            'password': $('#password').val(),
            'mail': $('#mail').val(),
            'tel': $('#tel').val()
        };
        self.ajax('/user/save', data, function(data) {
            if(data.code == 200){
                console.log('保存成功,ID is ' + data.data);
                self.home();
            }else{
                alert('保存失败' + data.data);
            }
        });
    };

    //重置行为
    this.reset = function() {
        $('#username').val('');
        $('#password').val('');
        $('#mail').val('');
        $('#tel').val('');
    };

    //取消行为
    this.home = function() {
        window.location.href = '/';
    };

    this.ajax = function(url, data, callback) {
        $.ajax({
            url: url,
            type: "post",
            async: true,
            cache: false,
            data: data,
            dataType: "json",
            success: function(recData) {
                callback(recData);
            },
            error: function(e) {
                alert(e);
                console.log('error:', e);
            }
        });
    };

    this.getQueryString = function (name) {
		    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
		    var r = window.location.search.substr(1).match(reg);
		    if (r != null) return unescape(r[2]); return null;
	  };
}
