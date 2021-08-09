<?php


namespace App\Services;

use App\Models\Tag;

class TagsView
{
    protected $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function tagsCloud()
    {
        return $this->tag->has('articles')->get();
    }
}
