<?php

namespace App\Models;


class Menu extends Model
{
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'id';
    }
}
