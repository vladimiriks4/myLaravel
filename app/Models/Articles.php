<?php

namespace App\Models;

class Articles extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
