<?php

namespace App\Http\Controllers;

use  App\Models\Tag;
use  App\Models\Article;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        $articles = $tag->articles()->with('tags')->get();
        return view('articles.index', compact('articles'));
    }
}
