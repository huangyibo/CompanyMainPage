<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>活动发布平台</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="description" content="活动发布系统。">
    <meta name="author" content="Bob">

    <link rel="shortcut icon" href="/assets/images/favicon.png">

    <link rel="apple-touch-icon" sizes="57x57" href="images/touchicons/apple-touch-icon-57-precomposed" />
    <link rel="apple-touch-icon" sizes="114x114" href="assets/touchicons/apple-touch-icon-114-precomposed" />
    <link rel="apple-touch-icon" sizes="72x72" href="assets/touchicons/apple-touch-icon-72-precomposed" />
    <link rel="apple-touch-icon" sizes="144x144" href="assets/touchicons/apple-touch-icon-144-precomposed" />

    @include('UEditor::head');

    <link rel="stylesheet" href="{{ elixir('assets/css/styles.css') }}">


</head>

<body class="{{ route_class() }}-page">

@include('layouts.partials.topnav')


<h2>编辑内容</h2>
        <div id="ue-container" name="body_original" placeholder="活动内容" class="form-control"
                  type="text/plain">
                    </div>
        <h2>编辑完成</h2>


@include('layouts.partials.footer')

<script type="text/javascript">

    var ue = UE.getEditor('ue-container', {
            initialFrameHeight : 350,
            zIndex: '0',
        });

    ue.ready(function () {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
    });

</script>

<script src="{{ elixir('assets/js/scripts.js') }}" charset="utf-8"></script>




</body>

</html>
