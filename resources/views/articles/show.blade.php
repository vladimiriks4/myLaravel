@extends('layout')

@section('title', 'Статья детально')

@section('content')
    <main role="main" class="container">
        <div class="row">

            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    {{ $article->title }}
                </h3>
                <p class="blog-post-meta">{{ $article->created_at->toFormattedDateString() }}</p>
                <p>{{ $article->body }}</p>

                <nav class="blog-pagination">
                    <a href="/">Вернуться к списку статей</a>
                </nav>
            </div><!-- /.blog-main -->

        </div><!-- /.row -->
    </main><!-- /.container -->
@endsection
