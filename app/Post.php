<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
        
        //$this->comments()->create(compact('body'));
        
        Comment::create([
             'body' => $body,
             'post_id' => $this->id,
             'user_id' => auth()->id()
        ]);
    }

    public function scopeFilter($query, $filters) {
        if ($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }
        
        if ($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }

    public static function archives() {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get();
            //->toArray(); 
    }
}
