<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Notifications\ArticleChangesNotification;
use App\Services\TagsSynchronizer;

class ArticlesController extends Controller
{
    public $event;

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
        $this->middleware('can:update,article')->except('index', 'store', 'create', 'show', 'successEdit');
    }

    public function index()
    {
        $articles = Article::with('tags')->latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function successEdit($success)
    {
        $articles = Article::latest()->get();
        return view('articles.index', compact('articles', 'success'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(StoreArticleRequest $request, TagsSynchronizer $tagsSynchronizer)
    {
        $validated = $request->validated();
        $validated["published"] = isset($validated["published"]);
        $validated['owner_id'] = auth()->id();
        $article = Article::create($validated);

        $tags = collect(explode(',', request('tags')));
        $tagsSynchronizer->sync($tags, $article);

        $this->event = 'Статья создана';
        $article->owner->notify(new ArticleChangesNotification($article, $this->event));

        return redirect()->route('successEdit', ['success' => $this->event]);
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article, UpdateArticleRequest $request, TagsSynchronizer $tagsSynchronizer)
    {
        $validated = $request->validated();
        $validated["published"] = isset($validated["published"]);
        $article->update($validated);

        $tags = collect(explode(',', request('tags')));
        $tagsSynchronizer->sync($tags, $article);

        $this->event = 'Статья изменена';
        $article->owner->notify(new ArticleChangesNotification($article, $this->event));

        return redirect()->route('successEdit', ['success' => $this->event]);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        $this->event = 'Статья удалена';
        $article->owner->notify(new ArticleChangesNotification($article, $this->event));

        return redirect()->route('successEdit', ['success' => $this->event]);
    }
}
