<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";
    protected $fillable = ['title','text','user_id','img_id'];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function author()
    {
        return $this->belongsTo('App\User',"user_id");
    }

    /**
     * @return mixed
    */
    public function images()
    {
        return $this->belongsToMany(Image::class, 'articles_images');
    }

    public function mainImageLink()
    {
        return $this->images()->where("main", true)->first()->link;
    }

    
 
}
