@extends('spark::layouts.app')

@section('content')
<div class="container py-2">
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-4">
            @include('gazette::posts.card')
        </div>
        @endforeach
    </div>
</div>

{{ $posts->links() }}
@endsection
