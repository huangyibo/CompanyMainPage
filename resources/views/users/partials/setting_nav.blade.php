<div class="">
    <div class="list-group text-center">
      <a href="{{ route('users.edit', $currentUser->id) }}" class="list-group-item {{ navViewActive('users.edit') }}">
          <i class="text-md fa fa-list-alt" aria-hidden="true"></i>
          &nbsp;{{ '个人信息' }}
      </a>
      <a href="{{ url('/users/'.$currentUser->id.'/edit_avatar') }}" class="list-group-item {{ navViewActive('users.edit_avatar') }}">
          <i class="text-md fa fa-picture-o" aria-hidden="true"></i>
           &nbsp;{{ '修改头像' }}
       </a>

        <a href="{{ url('/users/'.Auth::user()->id.'/edit_password') }}" class="list-group-item {{ navViewActive('users.edit_password') }}">
            <i class="text-md fa fa-flask" aria-hidden="true"></i>
            &nbsp;{{ '修改密码' }}
        </a>
    </div>
</div>
