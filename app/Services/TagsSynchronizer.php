<?php


namespace App\Services;

use App\Models\Model;
use App\Models\Tag;
use Illuminate\Support\Collection;

class TagsSynchronizer
{
    public function sync(Collection $tags, Model $model)
    {
        $articleTags = $model->tags->keyBy('name');
        $syncIds = $articleTags->IntersectByKeys($tags)->pluck('id')->toArray();
        $tagsToAttach = $tags->diffKeys($articleTags);
        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $syncIds[] = $tag->id;
        }
        $model->tags()->sync($syncIds);
    }

    public function syncStore(Collection $tags, Model $model)
    {
        foreach ($tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $syncIds[] = $tag->id;
        }
        $model->tags()->sync($syncIds);
    }

    public function syncUpdate(Collection $tags, Model $model)
    {
        $articleTags = $model->tags->keyBy('name');
        $syncIds = $articleTags->IntersectByKeys($tags)->pluck('id')->toArray();
        $tagsToAttach = $tags->diffKeys($articleTags);

        dd(
            $tags,
            $articleTags,
            $syncIds,
            $tagsToAttach
        );

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $syncIds[] = $tag->id;
        }
        $model->tags()->sync($syncIds);
    }
}
