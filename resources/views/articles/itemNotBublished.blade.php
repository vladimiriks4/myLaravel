<div class="blog-post">
    <h2 class="blog-post-title">
        <a class="blog-post-not-published"
           href="{{ route('show', ['article' => $article->slug]) }}">{{ $article->title }}
        </a>
    </h2>

    @include('articles.tags', ['tags' => $article->tags])

    <p class="blog-post-meta">@datetime($article->created_at)</p>
    <p class="blog-description">не опубликовано</p>
    {{--    <p class="blog-post-meta">{{ $article->created_at->toFormattedDateString() }}</p>--}}

    <p>{{ $article->preview }}</p>
</div><!-- /.blog-post -->
