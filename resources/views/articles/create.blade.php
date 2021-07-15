@extends('layout')

@section('title', 'Создать статью')

@section('content')
    <main role="main" class="container">
        <div class="row">

            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    Создание статьи
                </h3>

                <form method="post" action="/">
                    @csrf
                    @include('articles.formFields')

{{--                    <div class="form-group">--}}
{{--                        <label for="inputSlug" class="form-label">Символьный код</label>--}}
{{--                        <input type="text" class="form-control" id="inputSlug" placeholder="Введите символьный код"--}}
{{--                               name="slug"--}}
{{--                               value="{{ old('slug') }}"--}}
{{--                        >--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="inputTitle" class="form-label">Название статьи</label>--}}
{{--                        <input type="text" class="form-control" id="inputTitle" placeholder="Введите название статьи"--}}
{{--                               name="title"--}}
{{--                               value="{{ old('title') }}"--}}
{{--                        >--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="inputPreview" class="form-label">Краткое описание</label>--}}
{{--                        <input type="text" class="form-control" id="inputPreview" placeholder="Введите краткое описание"--}}
{{--                               name="preview"--}}
{{--                               value="{{ old('preview') }}"--}}
{{--                        >--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="inputBody" class="form-label">Описание статьи</label>--}}
{{--                        <input type="text" class="form-control" id="inputBody" placeholder="Введите описание"--}}
{{--                               name="body"--}}
{{--                               value="{{ old('body') }}"--}}
{{--                        >--}}
{{--                    </div>--}}
{{--                    <div class="mb-3 form-check">--}}
{{--                        <label class="form-check-label" for="checkPublished">Опубликовано</label>--}}
{{--                        <input type="checkbox" class="form-check-input" id="checkPublished"--}}
{{--                               name="published"--}}
{{--                               @if (old('published') == 'on')--}}
{{--                               checked--}}
{{--                            @endif--}}
{{--                        >--}}
{{--                    </div>--}}
{{--                    <button type="submit" class="btn btn-primary">Создать статью</button>--}}
                </form>
            </div><!-- /.blog-main -->

        </div><!-- /.row -->
    </main><!-- /.container -->
@endsection
