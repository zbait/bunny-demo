/*
 * 用户页面渲染JS
 */
$(function() {
    var user = new User();
    //初始化页面数据
    user.init();
});

/**
 * 视图渲染类
 */
function View() {

    var self = this;

    //空数据渲染
    this.getEmptyEle = function() {
        return $('<tr>').append($('<td>').addClass('text-center').attr('colspan', '5').html('往昔一切如空，今昔一切如新'));
    };

    //用户属性渲染
    this.getUserAttrEle = function(attr) {
        return $('<td>').addClass('text-center').html(attr);
    };

    //用户数据渲染
    this.getUserEle = function(user) {
        return $('<tr>')
            .append(self.getUserAttrEle(user.username))
            .append(self.getUserAttrEle(user.password))
            .append(self.getUserAttrEle(user.mail))
            .append(self.getUserAttrEle(user.tel))
            .append(self.getBtnEle(user.id));
    };

    //用户操作渲染
    this.getBtnEle = function(id) {
        return $('<td>').addClass('text-center')
            .append($('<a>').attr('href', '/user/edit').html('新增 | '))
            .append($('<a>').attr('href', '/user/edit?id=' + id).html('修改 | '))
            .append($('<a>').attr('name', 'delete').attr('id', id).html('删除'));
    };

    //分页信息渲染
    this.getPageEle = function(page) {
        var url = '/?page=';
        var page_ele = $('<ul>').addClass('pagination');
        var pages = page.pageList;
        for(var i=0;i<pages.length;i++){
            var pageNum = pages[i];
            //head
            if(i == 0){
                if(pageNum > 1){
                    page_ele.append($('<li>').html('<a href="'+ url + (pageNum-1) +'">&laquo;</a>'));
                }else{
                    page_ele.append($('<li>').addClass('disabled').html('<a>&laquo;</a>'));
                }
            }
            //inner
            if(pageNum == page.currentPageNum){
                page_ele.append($('<li>').addClass('active').html('<a href="'+ url + pageNum +'">'+ pageNum +'</a>'));
            }else{
                page_ele.append($('<li>').html('<a href="'+ url + pageNum +'">'+ pageNum +'</a>'));
            }
            //end
            if(i == pages.length - 1){
                if(pageNum < page.pageTotalNum){
                    page_ele.append($('<li>').html('<a href="'+ url + (pageNum+1) +'">&raquo;</a>'));
                }else{
                    page_ele.append($('<li>').addClass('disabled').html('<a>&raquo;</a>'));
                }
            }
        }
        //    .append();

        return page_ele;
    };
}

/**
 * 用户类
 */
function User() {
    var self = this;
    var view = new View();

    //初始化用户列表页面
    this.init = function() {
        //获取用户数据
        var page = self.getQueryString('page');
        self.ajax('/user/query', {'page':page}, function(data) {
            //渲染列表数据
            var table_th_ele = $('#table-th');
            var users = data.users;
            if (users.length > 0) {
                for (var i = 0; i < users.length; i++) {
                    table_th_ele.after(view.getUserEle(users[i]));
                }
            } else {
                table_th_ele.after(view.getEmptyEle());
            }
            //添加删除行为
            $('[name="delete"]').click(self.delete);
            //渲染分页数据
            var page_ele = $('#page');
            page_ele.append(view.getPageEle(data.page));
        });
    };

    //删除按钮行为
    this.delete = function() {
        var data = {
            'id': $(this).attr('id')
        };
        self.ajax('/user/delete', data, function(data) {
            if(data.code == 200){
                self.home();
            }else{
                alert('删除失败：' + data.data);
            }
        });
    };

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
                alert('出错了，请查看console');
                console.log('error:', e);
            }
        });
    };

    //获取URL参数
    this.getQueryString = function (name) {
		    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
		    var r = window.location.search.substr(1).match(reg);
		    if (r != null) return unescape(r[2]); return null;
	  };
}
