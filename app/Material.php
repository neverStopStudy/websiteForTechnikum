<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['subject_id','name','text','link'];

    public function subject()
    {
        return $this->belongsTo('App\Subject',"subject_id");
    }
}
