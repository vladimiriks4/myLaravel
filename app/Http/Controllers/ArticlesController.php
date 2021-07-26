<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePatchRequest;
use App\Models\Articles;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Articles::latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function successEdit($success)
    {
        $articles = Articles::latest()->get();
        return view('articles.index', compact('articles', 'success'));
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
        return redirect()->route('successEdit', ['success' => 'Статья создана']);
    }

    public function edit(Articles $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Articles $article, UpdatePatchRequest $request)
    {
        $validated = $request->validated();
        $validated["published"] = isset($validated["published"]);
        $article->update($validated);
        return redirect()->route('successEdit', ['success' => 'Статья изменена']);
    }

    public function destroy(Articles $article)
    {
        $article->delete();
        return redirect()->route('successEdit', ['success' => 'Статья удалена']);
    }
}
