<div class="card">
    <a href="{{ $post->path() }}"><img src="{{ $post->thumbnail() }}" alt="{{ $post->title }}" class="card-img-top"></a>
    <div class="card-body">
        <h4>
            <a href="{{ $post->path() }}">{{ $post->title }}</a>
        </h4>
        <p class="card-text">{{ $path->excerpt() }}</p>
        <a href="{{ $post->path() }}">Read more</a>
    </div>
</div>
