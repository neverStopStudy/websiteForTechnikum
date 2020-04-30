<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = Role::where('slug','student')->first();
        $teacher = Role::where('slug','$teacher')->first();

        $createLessons = Permission::where('slug','create-lessons')->first();
        $solveLessons = Permission::where('slug','solve-lessons')->first();
        
        $user1 = new User();
        $user1->name = 'Jhon Deo';
        $user1->email = 'jhon@deo.com';
        $user1->password = bcrypt('secret');
        $user1->save();
        $user1->roles()->attach($teacher);
        $user1->permissions()->attach($createLessons);
 
        $user2 = new User();
        $user2->name = 'Mike Thomas';
        $user2->email = 'mike@thomas.com';
        $user2->password = bcrypt('secret');
        $user2->save();
        $user2->roles()->attach($student);
        $user2->permissions()->attach($solveLessons);
    }
}
