<div class="card">
    <a href="{{ $post->path() }}"><img src="/storage{{ $post->thumbnail() }}" alt="{{ $post->title }}" class="w-100 img-fluid rounded-top"></a>
    <div class="card-body">
        <h4>
            <a href="{{ $post->path() }}">{{ $post->title }}</a>
        </h4>
        <p class="card-text">{{ $post->excerpt() }}</p>
        <a href="{{ $post->path() }}">Read more</a>
    </div>
</div>
