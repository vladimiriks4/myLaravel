@extends('layout')

@section('title', 'Создать статью')

@section('content')
    <main role="main" class="container">
        <div class="row">

            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    Создание статьи
                </h3>

                @include('layout.errors')

                <form method="post" action="/">
                    @csrf
                    @include('articles.formFields')
                </form>
            </div><!-- /.blog-main -->

        </div><!-- /.row -->
    </main><!-- /.container -->
@endsection
