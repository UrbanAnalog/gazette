@extends('spark::layouts.app')

@section('content')
<div class="container py-2">
    <div class="columns-2">
        @foreach ($posts as $post)
        <h2>
            <a href="{{ $post->path() }}">
                {{ $post->title }}
            </a>
        </h2>
        <p>Posted on {{ $post->created_at }}</p>
        @endforeach
    </div>
</div>

{{ $posts->links() }}
@endsection
