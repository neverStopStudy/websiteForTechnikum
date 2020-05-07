<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['subject_id','user_id','name','text','link'];

    public function subject()
    {
        return $this->belongsTo('App\Subject',"subject_id");
    }

    public function author()
    {
        return $this->belongsTo('App\User',"user_id");
    }
}
