<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = ['name','slug',];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'roles_permissions');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_roles');
    }

    public static function admin()
    {
        $roles = Role::with('users')->where('slug','admin')->first();
        return $admin = $roles->users->first();
    }
}
