<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = new Role();
        $student->name = 'Student';
        $student->slug = 'student';
        $student->save();

        $teacher = new Role();
        $teacher->name = 'Teacher';
        $teacher->slug = 'teacher';
        $teacher->save();
    }
}
