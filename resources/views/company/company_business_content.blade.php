@extends('layouts.default')

@section('title', '事業内容' . ' | ')

@section('content')
    <div class="colom-container">
        <aside class="col-xs-3 col-sm-3 col-md-3 col-lg-3 main-col">
            @include('company.partials._introduction_menu')
        </aside>
        <main class="col-xs-9 col-sm-9 col-md-9 col-lg-9 left-col">
            <div class="panel panel-default padding-md">

                <div class="panel-body ">

                    <div class="block-header">
                        <h2>事業内容 </h2>
                    </div>

                    <div class="content-body">
                        <!-- 事业内容 -->
                        @include('company.partials._business_content')

                    </div>
                </div>
            </div>
        </main>

    </div>
@endsection