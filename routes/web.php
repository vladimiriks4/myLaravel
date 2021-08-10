<?php

use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    return view('about');
});

Route::get('/', 'App\Http\Controllers\ArticlesController@index');
Route::get('/contacts', 'App\Http\Controllers\FeedbacksController@create');
Route::get('/{success}', 'App\Http\Controllers\ArticlesController@successEdit')->name('successEdit');
Route::get('/articles/tags/{tag}', 'App\Http\Controllers\TagsController@index');
Route::get('/articles/create', 'App\Http\Controllers\ArticlesController@create');
Route::post('/', 'App\Http\Controllers\ArticlesController@store');
Route::get('/articles/{article}', 'App\Http\Controllers\ArticlesController@show');
Route::get('/articles/{article}/edit', 'App\Http\Controllers\ArticlesController@edit');
Route::patch('/articles/{article}', 'App\Http\Controllers\ArticlesController@update');
Route::delete('/articles/{article}', 'App\Http\Controllers\ArticlesController@destroy');

Route::get('/admin/feedback', 'App\Http\Controllers\FeedbacksController@feedback');
Route::post('/admin/feedback', 'App\Http\Controllers\FeedbacksController@store');
