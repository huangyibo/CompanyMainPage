(function () {
    /* 吸顶条Javascript代码片段 */
    function scrollside() {
        var scrollHeight = $(window).scrollTop();
        var navbarHeight = 100;
        return (scrollHeight > navbarHeight) ? true : false;
    }

    window.onscroll = function () {
        var $navbar = $("#top-navbar");

        if (scrollside()) {
            $navbar.addClass("nav_scroll");
        } else {
            $navbar.removeClass("nav_scroll");
        }
    }

    window.onload = function () {
        var $navbar = $("#top-navbar");
        $navbar.removeClass("nav_scroll");
    }

    /**
     * 设置轮播定时滚动
     */
    $('.carousel').carousel({
        interval: 3000
    });

    function promptRegister() {
        swal({
                title: "订阅 Laravel 资讯",
                text: "请前往「Laravel China 社区」注册账号，即可自动订阅「Laravel 资讯」。",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#21BA45",
                confirmButtonText: "前往注册",
                cancelButtonText: "已注册",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    window.location = 'https://laravel-china.org/login-required';
                } else {
                    swal.close();
                    // fixing body wont scroll
                    document.body.style.overflow = "scroll";
                }
            });
    }

    // 订阅按钮点击
    $('#subscrib-btn').click(function () {
        promptRegister();
    });

    $('#subscribe-input').focus(function () {
        promptRegister();
    });

    // update user info
    /*$('#user-edit-submit').click(function (e) {
        var token = $('#_token').val();
        e.preventDefault();
        var form_action = $('#update-form').attr('action');

        var formData = {
            _token: token,
            // _method: $('#_method').val(),
            gender: $('#gender option:selected').val(),
            // email: $('#email').val(),
            real_name: $('#real_name').val(),
            company: $('#company').val(),
            weibo_id: $('#weibo_id').val(),
            personal_website: $('#personal_website').val(),
            introduction: $('#introduction').val()
        };

        $.ajax({
            type: 'PUT',
            url: form_action,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log('success');
                $('#update-user-alert-success-content').innerHTML = '用户资料更新成功!';
                // $('#update-user-alert-success').show().delay(2000).hide();
            },
            error: function (data) {
                console.log('error');
                var error = data.responseText;
                var content;
                if (error) {
                    var index;
                    for (index in error) {
                        content = error[index];
                        break;
                    }
                } else {
                    content = '系统内部错误!'
                }


                $('#update-user-alert-danger-content').innerHTML = content;
                $('#update-user-alert-success').show().delay(2000).hide();
            }
        });

    });*/

})();
