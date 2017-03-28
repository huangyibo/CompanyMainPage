<ol class="breadcrumb">
    <li><a class="user-center-link" title="个人中心" href="{{ url('users/'.$user->id.'/posts/released') }}">个人中心</a></li>
    <li class="active">{{ 'Ta 发布的活动'.' ( '.count($posts).' ) ' }}</li>
</ol>

<div class="panel panel-default">

    <div class="panel-body posts">
        <ul class="list-group">
            @foreach($posts as $post)
                <li class="list-group-item" >

                    <a href="{{ route('posts.show', $post->id) }}" title="{{ $post->title }}" class="post-title-link text-overflow">
                        {{ $post->title }}
                    </a>

                    <span class="meta">

              <a href="{{ route('categories.show', $post->category->id) }}" title="{{ $post->category->name }}">
                    {{ $post->category->name }}
              </a>


        <span> ⋅ </span>
        {{ $post->apply_num.'人' }} 报名

        <span> ⋅ </span>
        <span class="timeago">{{ time_show($post->created_at) }}</span>

      </span>

                </li>
            @endforeach
        </ul>
    </div>
</div>