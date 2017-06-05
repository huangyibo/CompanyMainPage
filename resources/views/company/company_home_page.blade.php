@extends('layouts.default')

@section('title', '主页' . ' | ')

@section('content')
    <div class="colom-container">
        <aside class="col-sm-3 col-md-3 main-col">
            @include('company.partials._introduction_menu')
        </aside>
        <main class="col-sm-9 col-md-9 left-col">
            <div class="panel panel-default padding-md">

                <div class="panel-body ">

                    <div class="block-header">
                        <h2>HOMEPAGE </h2>
                    </div>

                    <div class="content-body">
                        <!-- About Us -->
                        @include('company.partials._home_about_us')

                        <!-- Business Content -->
                        @include('company.partials._home_business_content')
                    </div>
                </div>
            </div>
        </main>

    </div>
@endsection