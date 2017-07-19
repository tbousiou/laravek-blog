<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    // Specify the relation with post
    public function post() {
        return $this->belongsTo(Post::Class);
    }
}
