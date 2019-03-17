<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable implements MustVerifyEmail
{
    use SoftDeletes;
    use Notifiable;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function subscription()
    {
       return $this->belongsTo('App\Subscription');
    }

    public function viewed_posts()
    {
        return $this->belongsToMany('App\Post', 'post_user');
    }
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'featured', 'subscription_id'
    ];
    protected $appends = [ 'user_profile', 'first_namee', 'last_namee'];

    public function getUserProfileAttribute()
    {
        return asset($this->featured);
    }

    public function getFirstNameeAttribute()
    {
        return ucwords($this->first_name);
    }

    public function getLastNameeAttribute()
    {
        return ucwords($this->last_name);
    }


    protected $hidden = [
        'password', 'remember_token',
    ];

}
