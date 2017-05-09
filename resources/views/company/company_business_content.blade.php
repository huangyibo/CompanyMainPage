@extends('layouts.default')

@section('title', '事業内容' . ' | ')

@section('content')
    <div class="row colom-container">
        <aside class="col-md-3 main-col">
            @include('company.partials._introduction_menu')
        </aside>
        <main class="col-md-9 left-col">
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