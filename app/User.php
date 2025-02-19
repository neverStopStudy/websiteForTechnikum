<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\HasRolesAndPermissions;

class User extends Authenticatable
{
    use Notifiable, HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function articles()
    {
        return $this->hasMany("App\Article");
    }

    public function images()
    {
        return $this->belongsToMany(Image::class, 'users_images');
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'groups_users');
    }

    public function materials()
    {
        return $this->hasMany("App\Material");
    }
}
