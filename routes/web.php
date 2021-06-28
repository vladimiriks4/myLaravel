<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\ArticlesController@index');
//На этой странице выводится список опубликованных статей в порядке убывания даты создания.
//В каждом элементе выводятся его название, краткое описание и дата публикации.

Route::get('/about', function () {
    return view('about');
});

Route::get('/articles/create', 'App\Http\Controllers\ArticlesController@create');
//Выводится форма для создания статьи со следующими полями и правилами валидации

Route::post('/', 'App\Http\Controllers\ArticlesController@store');
//получение обработка и запись в БД новой статьи а после перенаправление на главную

Route::get('/articles/{article}', 'App\Http\Controllers\ArticlesController@show');
//На этой странице выводятся: название, дата создания,
//подробный текст статьи и ссылка на главную страницу со списком статей.

Route::get('/contacts', 'App\Http\Controllers\FeedbacksController@create');
//На этой странице выводится форма для создания сообщений отзывов со следующими полями и правилами валидации

Route::get('/admin/feedback', 'App\Http\Controllers\FeedbacksController@feedback');
//На этой странице выводится список сообщений, оставленных в форме обратной связи в виде простой таблицы.

Route::post('/admin/feedback', 'App\Http\Controllers\FeedbacksController@store');
//получение обработка и запись в БД новой статьи а после перенаправление на главную
