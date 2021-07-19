@extends('layout')

@section('title', 'Создать статью')

@section('content')
    <main role="main" class="container">
        <div class="row">

            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    Изменение статьи
                </h3>

                <form method="post" action="/articles/{{ $article->slug }}">
                    @csrf
                    @method('PATCH')
                    @include('articles.formFields')
                </form>
                <form method="POST" action="/articles/{{ $article->slug }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Удалить статью</button>
                </form>
            </div><!-- /.blog-main -->

        </div><!-- /.row -->
    </main><!-- /.container -->
@endsection
