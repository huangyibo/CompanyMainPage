    {{--padding-sm user-basic-nav--}}
    <div class="">
        <div class="list-group text-center">
            <a href="{{ url('users/'.$user->id.'/posts/released') }}" class="list-group-item {{ navViewActiveByUrl('users/'.$user->id.'/posts/released') }}">
                <i class="text-md fa fa-headphones"></i> Ta 发布的活动
            </a>

            @if(Auth::check())
            <a href="{{ url('users/'.Auth::user()->id.'/posts/apply_detail') }}" class="list-group-item {{ navViewActiveByUrl('users/'.Auth::user()->id.'/posts/apply_detail') }}">
               <i class="text-md fa fa-list-ul"></i> 活动报名情况
            </a>
            @endif

        </div>
    </div>
