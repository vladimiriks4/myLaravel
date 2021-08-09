<?php


namespace App\Services;

use App\Models\Tag;

class TagsView
{
    public function tagsCloud()
    {
        return Tag::has('articles')->get();
    }
}
