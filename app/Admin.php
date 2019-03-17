<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'password', 'featured', 'is_super',
    ];
    protected $appends = ['admin_name', 'admin_profile'];

    public function getAdminNameAttribute()
    {
        return ucwords($this->name);
    }

    public function getAdminProfileAttribute()
    {
        return asset($this->featured);
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
}
