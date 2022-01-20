<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

     public function tags()
    {
        return $this->belongsToMany('App\Models\tag','post_tags')->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\category','category_posts','category_id' , 'post_id')->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    
    public function likes()
    {
        return $this->hasMany('App\Models\like');
    }
}
