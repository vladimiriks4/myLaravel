@extends('layout')

@section('title', 'Главная')

@section('content')

    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Список статей
        </h3>

        @if (isset($success))
            <div id="my-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Успешный успех</strong> {{ $success }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @foreach($articles as $article)
            @include('articles.item')
        @endforeach
    </div><!-- /.blog-main -->

@endsection

