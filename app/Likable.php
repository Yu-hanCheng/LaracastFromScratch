<?php

namespace App;
use Illuminate\Database\Eloquent\Builder;

trait Likable
{
    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select article_id, SUM(liked) likes, SUM(!liked) dislikes from likes group by article_id',
            'likes', 
            'likes.article_id', 'articles.id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate(
            ['user_id' => $user ? $user->id : auth()->id],
            ['liked' => $liked]
        );
    }

    public function disLike($user = null)
    {
        $this->like($user, false);
    }

    public function isLikeBy($user)
    {
        return (bool) $user->likes
            ->where('article_id', $this->id)
            ->where('liked', true)
            ->count();
    }
    
    public function isDisLikeBy($user)
    {
        return (bool) $user->likes
            ->where('article_id', $this->id)
            ->where('liked', false)
            ->count();
    }
}