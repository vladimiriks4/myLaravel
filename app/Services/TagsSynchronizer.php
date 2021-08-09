<?php


namespace App\Services;

use App\Models\Model;
use App\Models\Tag;
use Illuminate\Support\Collection;

class TagsSynchronizer
{
    public function sync(Collection $tags, Model $model)
    {
        foreach ($tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $syncIds[] = $tag->id;
        }
        $model->tags()->sync($syncIds);
    }
}
