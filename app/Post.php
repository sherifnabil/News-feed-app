<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'slug', 
        'title',
        'post_body', 
        'summary', 
        'featured', 
        'other_images',
        'category_id',
        'user_id'
         /** 'approve' */
    ];
    protected $appends = ['main_image', 'other_images_show'];

    public function getMainImageAttribute()
    {
        return asset($this->featured);
    }


    public function getOtherImagesShowAttribute()
    {
        $img = explode('###', $this->other_images);
        return $img;
    }


    public function post()
    {
        return $this->belongsTo('App\Post');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'post_tag');
    }
    public function viewed_by()
    {
        return $this->belongsToMany('App\User', 'post_user');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
