@extends('layout')

@section('title', 'Главная')

@section('content')
    <main role="main" class="container">
        <div class="row">

            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    Список статей
                </h3>

{{--                @if (Session::has('flash_message'))--}}
{{--                    <div id="my-alert" class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--                        <strong>Успешный успех</strong> {{ Session::get('flash_message') }}--}}
{{--                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--                    </div>--}}
{{--                @endif--}}
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

        </div><!-- /.row -->
    </main><!-- /.container -->
@endsection

