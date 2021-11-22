<?php

use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/demo', function () {
    return view('demo');
});

Route::get('/about', function () {
    return view('about');
});

Auth::routes();

Route::get('/', 'App\Http\Controllers\ArticlesController@index')->name('index');
Route::get('/contacts', 'App\Http\Controllers\FeedbacksController@create');
Route::get('/articles/tags/{tag}', 'App\Http\Controllers\TagsController@index');
Route::get('/articles/create', 'App\Http\Controllers\ArticlesController@create');
Route::post('/', 'App\Http\Controllers\ArticlesController@store');
Route::get('/articles/{article}', 'App\Http\Controllers\ArticlesController@show')->name('show');
Route::get('/articles/{article}/edit', 'App\Http\Controllers\ArticlesController@edit');
Route::patch('/articles/{article}', 'App\Http\Controllers\ArticlesController@update');
Route::delete('/articles/{article}', 'App\Http\Controllers\ArticlesController@destroy');


Route::get('/admin', 'App\Http\Controllers\AdminController@index');
//        ->middleware('auth');
Route::get('/admin/articles/{article}/edit', 'App\Http\Controllers\AdminController@edit');
//Route::get('/admin/feedback', 'App\Http\Controllers\FeedbacksController@feedback');
Route::get('/admin/feedback', 'App\Http\Controllers\FeedbacksController@index')
        ->middleware('auth');
Route::post('/admin/feedback', 'App\Http\Controllers\FeedbacksController@store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
