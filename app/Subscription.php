<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{


    public function users()
    {
        return $this->hasMany('App\User');
    }

    protected $fillable = ['name', 'features', 'icon', 'notification_type', 'price'];


    protected $appends = ['plan_img', 'notification_format', 'plan_price', 'features_as_feature'];
    public function getPlanImgAttribute()
    {
        return asset($this->icon);
    }

    public function getNotificationFormatAttribute()
    {
        return  __('site.' . $this->notification_type);
    }

    public function getPlanPriceAttribute()
    {
        return $this->price . ' $';
    }


    public function getFeaturesAsFeatureAttribute()
    {
        $feature = explode('###', $this->features);
       
        return $feature;
    }

}
