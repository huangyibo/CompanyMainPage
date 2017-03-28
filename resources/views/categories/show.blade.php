@extends('layouts.default')

@section('title', isset($category) ? $category->name : '全部活动' . ' | ')

@section('content')

<div class="row colom-container">

    <div class="col-md-12">
        <div class="category-header">
            <h2 class=" font3"><i class="fa fa-folder-open-o"></i> {{ isset($category) ? $category->name : '全部活动' }}</h2>
        </div>
    </div>

    <div class="clearfix">

    </div>

    <main class="main-content grid">
        @include('common._posts')
    </main>

</div>

<div class="row colom-container" style="margin:0 auto;width: 100%">
    <div class="pull-right text-center col-md-6 col-md-offset-3">
    {!! $posts->render() !!}
    </div>
</div>

@endsection



@section('scripts')
<script type="text/javascript">

    $(document).ready(function()
    {
        $('.grid').masonry({
          // options...
          itemSelector: '.grid-item',
        });
    });

</script>
@stop
