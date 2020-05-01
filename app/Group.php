<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name'];

    public function students()
    {
        return $this->belongsToMany(User::class, 'groups_users');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'groups_subjects');
    }
}
