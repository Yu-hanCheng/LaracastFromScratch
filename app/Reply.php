<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function isBest()
    {
        return $this->id === $this->article->best_reply_id;
    }
}
