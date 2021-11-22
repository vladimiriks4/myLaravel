@extends('layout')

@section('title', 'Главная')

@section('content')

    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Список статей
        </h3>

        @if (session('success'))
            @alert(['type' => 'success'])
            @slot('title')
                Успешный успех
            @endslot
            {{ session('success') }}
            @endalert
        @endif

        @foreach($articles as $article)
            @include('articles.item')
        @endforeach
    </div><!-- /.blog-main -->

@endsection

