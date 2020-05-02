<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['name'];

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'groups_subjects');
    }

    public function materials()
    {
        return $this->hasMany("App\Material");
    }
}
