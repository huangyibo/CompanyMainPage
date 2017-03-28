@extends('layouts.default')

@section('title')
上传头像_@parent
@stop

@section('content')
<div class="row colom-container users-show">
    <aside class="col-md-3 main-col">
        @include('users.partials.setting_nav', ['currentUser' => Auth::user()])
    </aside>

  <div class="main-col col-md-9 left-col">

    <div class="panel panel-default padding-md">

      <div class="panel-body padding-bg">

        <h2><i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp;&nbsp;请选择照片</h2>
        <hr>

        @include('layouts.partials.errors')

        <form method="post" action="{{ url('/users/'.Auth::user()->id.'/update_avatar') }}"
              enctype="multipart/form-data" accept-charset="UTF-8">
            {{--<input name="_method" type="hidden" value="PATCH">--}}
            {!! csrf_field() !!}

            <div id="image-preview-div" STYLE="margin-bottom: 5px">
              <label for="exampleInputFile">选择图片：</label>
              <br>
              <img id="preview-img" class="avatar-preview-img" style="width: 150px; height: 150px; border: double RGB(233,234,237)" src="{{$currentUser->present()->gravatar(150)}}">
            </div>
            <div class="form-group">
              <input type="file" name="avatar" id="file" required>
            </div>
            <br>

            <button class="btn btn-lg btn-primary" id="upload-button" type="submit">上传图片</button>

            <div class="alert alert-info" id="loading" style="display: none;" role="alert">
              正在上传
              <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                </div>
              </div>
            </div>
            <div id="message"></div>
      </form>

    </div>
  </div>
  </div>


</div>

@stop

