<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";
    protected $fillable = ['title','text','user_id','image_link'];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function author()
    {
        return $this->belongsTo('App\User',"user_id");
    }

    public function images()
    {
        return $this->belongsToMany(Image::class, 'articles_images');
    }


    
 
}
