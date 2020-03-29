<?php
namespace Illuminate\Database;

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createLessons = new Permission();
        $createLessons->name = 'Create Lessons';
        $createLessons->slug = 'create-lessons';
        $createLessons->save();

        $solveLessons = new Permission();
        $solveLessons->name = 'Solve Lessons';
        $solveLessons->slug = 'solve-lessons';
        $solveLessons->save();
    }
}
