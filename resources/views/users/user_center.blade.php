@extends('layouts.default')

@section('title', '个人中心' . ' | ')

@section('content')
    <div class="row colom-container">
        <aside class="col-md-3 main-col">
            @include('users.user_info_panel', ['user' => $user])
            @include('users.partials.user_center_menu', ['user' => $user])
        </aside>
        <main class="col-md-9 left-col">
            <div class="panel panel-default padding-md">

                <div class="panel-body ">
                    @if(Request::path() === 'users/'.$user->id.'/posts/released')
                        @include('users.partials.user_post_list', ['user' => $user, 'posts' => $posts])
                    @elseif(Auth::check() && Request::path() === 'users/'.$user->id.'/posts/apply_detail')
                        @include('posts.posts_applicants_list', ['user' => $user, 'posts' => $posts])
                    @elseif(Auth::check() && Request::path() === 'posts/'.$post->id.'/applicants')
                        @include('applicants.applicants_list_by_post_id', ['user' => $user, 'post' => $post, 'applicants' => $applicants])
                    @endif

                </div>
            </div>
        </main>

    </div>
@endsection