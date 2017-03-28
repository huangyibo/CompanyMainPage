/**
 * Created by bob on 2017/3/26.
 */
$(document).ready(function () {

    // update user info
    $('#user-edit-submit').click(function (e) {
        var token = $('#_token').val();
        $.ajaxSetup({
            hreaders: {
                'X-CSRF-TOKEN': token
            }
        });
        e.preventDefault();

        var formData = {
            _token: token,
            _method: $('#_method').val(),
            gender: $('#gender option:selected').val(),
            email: $('#email').val(),
            real_name: $('#real_name').val(),
            company: $('#company').val(),
            weibo_id: $('#weibo_id').val(),
            personal_website: $('#personal_website').val(),
            introduction: $('#introduction').val()
        };

        var type = 'POST';
        var user_id = $('#user_id').val();
        var my_url = 'users/' + user_id + '/update';
        console.log(formData);

        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });

    });


});
