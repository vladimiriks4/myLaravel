@extends('layout')

@section('title', 'Контакты')

@section('content')
    <main role="main" class="container">
        <div class="row">

            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    Оставить отзыв
                </h3>

                <form method="post" action="/admin/feedback">
                    @csrf

                    <div class="form-group">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="text" class="form-control" id="inputEmail" placeholder="Введите ваш email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="inputMessage" class="form-label">Отзыв</label>
                        <input type="text" class="form-control" id="inputMessage" placeholder="Оставьте отзыв" name="message">
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить отзыв</button>
                </form>
            </div><!-- /.blog-main -->

        </div><!-- /.row -->
    </main><!-- /.container -->
@endsection
