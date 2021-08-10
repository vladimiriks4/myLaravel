@extends('layout')

@section('title', 'Статья детально')

@section('content')

    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{ $article->title }}
            <a href="/articles/{{$article->slug}}/edit">Изменить</a>
        </h3>

        @include('articles.tags', ['tags' => $article->tags])

        <p class="blog-post-meta">{{ $article->created_at->toFormattedDateString() }}</p>
        <p>{{ $article->body }}</p>

        <nav class="blog-pagination">
            <a href="/">Вернуться к списку статей</a>
        </nav>
    </div><!-- /.blog-main -->

@endsection
