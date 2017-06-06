@extends('layouts.default')

@section('title', 'イベント情報' . ' | ')

@section('content')
    <div class="colom-container">
        <aside class="col-xs-3 col-sm-3 col-md-3 col-lg-3 main-col">
            @include('company.partials._introduction_menu')
        </aside>
        <main class="col-xs-9 col-sm-9 col-md-9 col-lg-9 left-col">
            <div class="panel panel-default padding-md">

                <div class="panel-body ">

                    <div class="block-header">
                        <h2>イベント情報 </h2>
                    </div>

                    <div class="content-body">

                        <!-- Activity: comiday17 -->
                        @include('company.activity._activity_comiday17')
                        <!-- Activity: comiday18 -->
                        @include('company.activity._activity_comiday18')\
                        <!-- Activity: comiday19 -->
                        @include('company.activity._activity_comiday19')


                    </div>
                </div>
            </div>
        </main>

    </div>
@endsection