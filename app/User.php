<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function routeNotificationForNexmo($notification)
    {
        return '886972025948';//$this->phone_number;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function assignRole($role)
    {
        $this->roles()->save($role);
    }

    public function abilities()
    {
        return $this->roles->map->abilities->flatten()->pluck('name')->unique();
    }
}
