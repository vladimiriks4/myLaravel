<?php

use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    return view('about');
});

Auth::routes();

Route::get('/{success?}', 'App\Http\Controllers\ArticlesController@index')->name('index');
Route::get('/contacts', 'App\Http\Controllers\FeedbacksController@create');
Route::get('/articles/tags/{tag}', 'App\Http\Controllers\TagsController@index');
Route::get('/articles/create', 'App\Http\Controllers\ArticlesController@create');
Route::post('/', 'App\Http\Controllers\ArticlesController@store');
Route::get('/articles/{article}', 'App\Http\Controllers\ArticlesController@show')->name('show');
Route::get('/articles/{article}/edit', 'App\Http\Controllers\ArticlesController@edit');
Route::patch('/articles/{article}', 'App\Http\Controllers\ArticlesController@update');
Route::delete('/articles/{article}', 'App\Http\Controllers\ArticlesController@destroy');

Route::get('/admin/feedback', 'App\Http\Controllers\FeedbacksController@feedback');
Route::post('/admin/feedback', 'App\Http\Controllers\FeedbacksController@store');


