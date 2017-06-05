@extends('layouts.default')

@section('title', '会社概要' . ' | ')

@section('content')
    <div class="colom-container">
        <aside class="col-sm-3 col-md-3 col-lg-3 main-col">
            @include('company.partials._introduction_menu')
        </aside>
        <main class="col-sm-9 col-md-9 col-lg-9 left-col">
            <div class="panel panel-default padding-md">

                <div class="panel-body ">

                    <div class="block-header">
                        <h2>会社概要 </h2>
                    </div>

                    <div class="content-body">

                    <!-- 公司介绍：公司简介 -->
                        @include('company.partials._introduction_table')

                    </div>
                </div>
            </div>
        </main>

    </div>
@endsection