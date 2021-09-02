<div class="blog-post">
    <h2 class="blog-post-title">
        <a href="{{ route('show', ['article' => $article->slug]) }}">{{ $article->title }}</a>
    </h2>

    @include('articles.tags', ['tags' => $article->tags])

    <p class="blog-post-meta">{{ $article->created_at->toFormattedDateString() }}</p>

    <p>{{ $article->preview }}</p>
</div><!-- /.blog-post -->
