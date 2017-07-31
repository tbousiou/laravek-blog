<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //

    // Specify the relation with posts
    public function posts() {
        return $this->belongsToMany(Post::Class);
    }

    // Override route model binding to accept tag name to urls
    public function getRouteKeyName() {
        return 'name';
    }
}
