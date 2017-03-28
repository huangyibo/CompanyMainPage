<div class="box">
    <div class="padding-sm user-basic-info">
        <div style="">

            <div class="media">
                <div class="media-left">
                    <div class="image">
                        <img class="media-object avatar-112 avatar img-thumbnail"
                             style="width: 112px; height: 112px;border-radius: 50%;"
                             src="{{ $user->avatar ? $user->present()->gravatar(380) : 'https://dn-phphub.qbox.me/uploads/avatars/1_1479342408.png?imageView2/1/w/200/h/200'}}">
                    </div>

                    <div class="role-label text-center">
                        <a class="label label-success role" href="#">
                            @if($user->can('visit-admin'))
                                {{ '管理员' }}
                            @else
                                {{'普通用户'}}
                            @endif
                        </a>
                    </div>

                </div>
                <div class="media-body">
                    <h3 class="media-heading" style="margin-top: 15px;">
                        @if (Auth::user()->real_name)
                            {{ Auth::user()->real_name }}
                        @elseif(Auth::user()->name)
                            {{ Auth::user()->name }}
                        @endif
                    </h3>

                    <div class="item number">
                        注册于 <span class="timeago">{{ time_show($user->created_at) }}</span>
                    </div>

                    @if($user->last_actived_at)
                        <div class="item number">
                            活跃于 <span class="timeago">{{ time_show($user->last_actived_at) }}</span>
                        </div>
                    @endif

                </div>
            </div>

        </div>

        <hr>

        <div class="topic-author-box text-center">
            <ul class="list-inline">

                @if ($user && $user->github_id)
                    <li class="popover-with-html" data-trigger="click" data-toggle="popover" data-container="body"
                        data-placement="top"
                        data-content="{{ $user->github_id }}">
                        <a href="{{ 'https://github.com/'.$user->github_id }}" target="_blank">
                            <i class="fa fa-github-alt"></i> GitHub
                        </a>
                    </li>
                @endif

                @if ($user && $user->weibo_id)
                    <li class="popover-with-html" data-trigger="click" data-toggle="popover" data-container="body"
                        data-placement="top"
                        data-content="{{ $user->weibo_id }}">
                        <a href="{{ 'http://weibo.com/u/'.$user->weibo_id }}" target="_blank">
                            <i class="fa fa-weibo"></i> Weibo
                        </a>
                    </li>
                @endif

                @if ($user && $user->wechat_openid)
                    <li class="popover-with-html" data-trigger="click" data-toggle="popover" data-container="body"
                        data-placement="top"
                        data-content="<img src='{{asset('assets/images/qrcode_new.png')}}' style='width:100%'>">
                        <a href="{{ 'http://weibo.com/u/'.$user->weibo_id }}" target="_blank">
                            <i class="fa fa-wechat"></i> 微信
                        </a>
                    </li>
                @endif

                @if ($user && $user->personal_website)
                    <li class="popover-with-html" data-trigger="click" data-toggle="popover" data-container="body"
                        data-placement="top"
                        data-content="{{ $user->personal_website }}">
                        <a href="{{ $user->personal_website }}" rel="nofollow" target="_blank">
                            <i class="fa fa-globe"></i> Website
                        </a>
                    </li>
                @endif

                @if ($user && $user->personal_website)
                    <li class="popover-with-html" >
                        <a role="button" data-trigger="click" data-toggle="popover" data-container="body"
                           data-placement="top"
                           data-content="{{ $user->company }}" title="{{$user->company}}">
                            <i class="fa fa-users"></i> 公司
                        </a>
                    </li>
                @endif

                @if ($user && $user->email)

                    <li class="popover-with-html">
                        <a role="button" data-trigger="click" data-toggle="popover" data-container="body"
                           data-placement="top"
                           data-content="{{$user->email}}" title="{{$user->email}}">
                            <i class="fa fa-envelope-o"></i> Email
                        </a>
                    </li>

                @endif

                @if ($user && $user->introduction)
                    <li class="popover-with-html">
                        <a role="button"  data-trigger="click" data-toggle="popover" data-container="body"
                           data-placement="top"
                           data-content="{{$user->introduction}}" title="{{$user->introduction}}">
                        <i class="fa fa-id-card"></i> 个人简介
                    </li>
                @endif

            </ul>

        </div>


        @if(Auth::check() && Auth::user()->id === $user->id)
            <hr>
            <a class="btn btn-info btn-block" href="{{ route('users.edit', $user->id) }}">
                <i class="fa fa-edit"></i> 编辑资料
            </a>
        @endif

    </div>
</div>