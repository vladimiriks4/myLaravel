<?php

namespace App\Http\Controllers;

use App\Models\Articles;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Articles::latest()->get();

        return view('articles.index', compact('articles'));
    }

    public function show(Articles $article)
    {
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required|string|between:5,100',
            'preview' => 'required|string|max:255',
            'body' => 'required|string',
            'slug' => 'required|unique:articles|regex:/^[a-zA-Z0-9_-]+$/u',
            'published' => 'in:on',
        ]);
        $request = request()->all();
        if (isset($request["published"])) {
            $request["published"] = 1;
        }

        Articles::create($request);
        return redirect('/');
    }
}
