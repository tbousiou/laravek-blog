<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'body', 'user_id'];

    // Specify the One to Many relation with Comments
    public function comments() {
        return $this->hasMany(Comment::Class);
    }


    // Specify the relation with user
    public function user() {
        return $this->belongsTo(User::Class);
    }

    public function addComment($body) {
        
        $this->comments()->create(compact('body'));
        
        // Alternative way of creating a comment
        // Comment::create([
        //     'body' => $body,
        //     'post_id' => $this->id
        // ]);
    }
}
