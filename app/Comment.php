<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['article_id','user_id','text'];

    public function article()
    {
        return $this->belongsTo('App\Article');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
