<?php

namespace App\Models;

class Article extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
