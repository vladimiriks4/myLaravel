@extends('layout')

@section('title', 'О нас')

@section('content')

    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Заголовок на странице о нас
        </h3>
        <p>Страница о нас с обычным статичным текстом. Здесь рассказано много интересного о нас</p>
    </div><!-- /.blog-main -->

    <div class="col-md-8 blog-main">
        @admin()
            Сработало
        @endadmin
    </div>

{{--    @component('components.alert', ['type' => 'success'])--}}
{{--        @slot('title')--}}
{{--            Уууууупс--}}
{{--        @endslot--}}
{{--        <b>Что-то</b> пошло не так--}}
{{--    @endcomponent--}}

    @alert(['type' => 'success'])
        @slot('title')
            Уууууупс
        @endslot
        <b>Что-то</b> пошло не так
    @endalert

@endsection

