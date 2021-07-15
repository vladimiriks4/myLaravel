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

        if (isset($validated["published"])) {
            $validated["published"] = 1;
        }

        Articles::create($validated);
        return redirect('/');
    }

    public function edit(Articles $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Articles $article, StorePostRequest $request)
//    public function update(Articles $article)
    {
//        dd($request->only(['slug', 'title', 'preview', 'body', 'published']));
//        dd($request->all());

//        $validated = request()->all();
//        dd($validated);
//        if (isset($validated["published"])) {
//            $validated["published"] = 1;
//        } else {
//            $validated["published"] = 0;
//        }
        $validated = $request->validated();
//        dd($validated);
        $validated["published"] = isset($validated["published"]);

        $article->update($validated);
//        dd($article);
        return redirect('/');
    }

    public function destroy(Articles $article)
    {
        $article->delete();
        return redirect('/');
    }
}
