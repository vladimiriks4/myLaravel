<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    //    public function __construct()
//    {
////        dd(Auth::user());
//        $this->middleware('auth');
//    }

    public function index()
    {
//        Gate::authorize('view-admin');
//        dd(Auth::user()->role->name);
//        $feedbacks = Feedback::latest()->get();
//        return view('admin.articlesAdmin', compact('feedbacks'));
        $articles = Article::with('tags')->latest()->get();
        return view('admin.articles', compact('articles'));
    }

    public function edit(Article $article)
    {
        return view('admin.edit', compact('article'));
    }
}
