<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['post_id', 'body', 'user_id'];
    
    // Specify the relation with post
    public function post() {
        return $this->belongsTo(Post::Class);
    }


    // Specify the relation with user
    public function user() {
        return $this->belongsTo(User::Class);
    }


}
