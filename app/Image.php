<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = "images";

    protected $fillable = ['article_id','link','main'];

    public function article()
    {
        return $this->belongsTo("App\Article");
    }
}
