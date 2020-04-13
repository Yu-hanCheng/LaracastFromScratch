<?php

namespace App;

trait Followable
{
    public function following(User $user)
    {
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }

    public function follow(user $user)
    {
        return $this->follows()->save($user);
    }

    public function unfollow(user $user)
    {
        return $this->follows()->detach($user);
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }
}