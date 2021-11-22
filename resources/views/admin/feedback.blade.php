@extends('layout')

@section('title', 'Админ. раздел')

@section('content')

            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    Админка. Список обращений
                </h3>

                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Email</th>
                            <th scope="col">Сообщение</th>
                            <th scope="col">Дата получения</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($feedbacks as $feedback)
                            @include('admin.item')
                        @endforeach
                    </tbody>
                </table>
            </div><!-- /.blog-main -->

@endsection
