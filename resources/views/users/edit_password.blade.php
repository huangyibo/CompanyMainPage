@extends('layouts.default')

@section('title')
修改密码_@parent
@stop

@section('content')
<div class="row colom-container users-show">
    <aside class="col-md-3 main-col">
        @include('users.partials.setting_nav', ['currentUser' => Auth::user()])
    </aside>

  <div class="main-col col-md-9 left-col">

    <div class="panel panel-default padding-md">

      <div class="panel-body padding-bg">

        <h2><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;&nbsp;修改密码</h2>
        <hr>
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
        @include('layouts.partials.errors')

        <form class="form-horizontal" role="form" method="post" action="{{ url('/password/reset') }}"
              enctype="multipart/form-data" accept-charset="UTF-8">

            {!! csrf_field() !!}

            <input type="hidden" name="token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-md-2 control-label">邮 箱：</label>
                <div class="col-md-6">
                    <input name="" class="form-control" type="text" value="{{ Auth::user()->email }}" disabled>
                    <input name="email" type="hidden" value="{{ Auth::user()->email }}">
                </div>
                <div class="col-sm-4 help-block">
                    设置密码后将可以使用此邮箱登录。
                </div>
            </div>

            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="col-md-2 control-label">密 码：</label>
                <div class="col-md-6">
                    <input type="password" class="form-control" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="col-sm-4 help-block">
                    密码至少6位以上，数字、字母、下划线的组合
                </div>
            </div>

            <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label class="col-md-2 control-label">确认密码：</label>
                <div class="col-md-6">
                    <input type="password" class="form-control" name="password_confirmation" required>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="col-sm-4 help-block">
                    请确认您的密码输入
                </div>
             </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <button class="btn btn-primary" id="user-edit-submit" type="submit">
                        <i class="fa fa-btn fa-refresh" style="margin-right: 5px;"></i>重置密码
                    </button>
                </div>
            </div>
      </form>

    </div>
  </div>
  </div>


</div>

@stop

@section('scripts')

@stop
