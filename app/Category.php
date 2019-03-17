<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    protected $fillable = [
        'name'
    ];
    protected $appends = ['cat_name'];

    public function getCatNameAttribute()
    {
        return ucwords($this->name);
    }

}
