<ol class="breadcrumb">
    <li><a class="user-center-link" title="个人中心" href="{{ url('users/'.$user->id.'/posts/released') }}">个人中心</a></li>
    <li class="active">{{ $post->title.' - ( '.count($applicants).'人报名 )' }}</li>
</ol>

<div class="panel panel-default">

    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>姓名</th>
                    <th>邮箱</th>
                    <th>手机号码</th>
                    <th>公司</th>
                    <th>职位</th>
                    <th>报名时间</th>
                    <th>备注</th>
                </tr>
                </thead>
                <tbody>
                @foreach($applicants as $applicant)
                    <tr>
                        <td>
                            <a title="{{$applicant->name}}">
                                {{ $applicant->name }}
                            </a>
                        </td>
                        <td title="{{$applicant->email}}">
                            <a>
                                {{ $applicant->email }}
                            </a>
                        </td>
                        <td title="{{ $applicant->phone }}">
                            <a>
                                {{ $applicant->phone }}
                            </a>
                        </td>
                        <td title="{{ $applicant->company_name }}">
                            <a>
                                {{ $applicant->company_name }}
                            </a>
                        </td>
                        <td title="{{ $applicant->position }}">
                            <a>
                                {{ $applicant->position }}
                            </a>
                        </td>
                        <td title="{{ $applicant->created_at }}">
                            <a>
                                {{ time_show($applicant->created_at) }}
                            </a>
                        </td>
                        <td title="{{ $applicant->message_text }}">
                            <a>
                                {{ $applicant->message_text }}
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>


    </div>
</div>