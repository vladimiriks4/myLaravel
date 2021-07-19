<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
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

    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();
        $validated["published"] = isset($validated["published"]);
        Articles::create($validated);

        \Session::flash('flash_message', 'Статья создана');
        return redirect('/');
    }

    public function edit(Articles $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Articles $article, StorePostRequest $request)
    {
        $validated = $request->validated();
        $validated["published"] = isset($validated["published"]);
        $article->update($validated);

        \Session::flash('flash_message', 'Статья изменена');
        return redirect('/');
    }

    public function destroy(Articles $article)
    {
        $article->delete();

        \Session::flash('flash_message', 'Статья удалена');
        return redirect('/');
    }
}
