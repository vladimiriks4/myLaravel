@extends('hello')

@section('title', 'Page demo title')

@section('content')
    Содержимое страницы Demo
@endsection

@section('sidebar')
    @parent
    <p>Переопределенное Demo содержимое боковой панели</p>
@endsection
