@extends('spark::layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>

    {!! $post->content !!}

    <div class="d-flex justify-content-between mt-5">
        @if($next)
        <a href="{{ $next->path() }}">&larr; {{ $next->title }}</a>
        @endif
        @if($previous)
        <a href="{{ $previous->path() }}">{{ $previous->title }} &rarr;</a>
        @endif
    </div>
</div>
@endsection
