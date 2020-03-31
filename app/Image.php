<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = "images";

    protected $fillable = ['link'];

     /**
     * @return mixed
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'articles_images');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_images');
    }
}
