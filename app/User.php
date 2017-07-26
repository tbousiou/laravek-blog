<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Specify the one to many relation with post
    public function posts() {
        return $this->hasMany(Post::Class);
    }

    public function publish(Post $post) {
        $this->posts()->save($post);
        
        // Post::create([
        //     'title' => request('title'),
        //     'body' => request('body'),
        //     'user_id' => auth()->id()
        // ]);
    }

    public function setPasswordAttribute($password) { 
        $this->attributes['password'] = bcrypt($password);
    }
}
