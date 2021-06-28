@extends('layout')

@section('title', 'Главная')

@section('content')
    <main role="main" class="container">
        <div class="row">

            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    Список статей
                </h3>

                @foreach($articles as $article)
                    @include('articles.item')
                @endforeach
            </div><!-- /.blog-main -->

        </div><!-- /.row -->
    </main><!-- /.container -->
@endsection

