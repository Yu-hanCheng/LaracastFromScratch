<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getRouteKeyName()
    {
        return 'slug'; // Article::where('slug', $article)->first()
    } 

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
