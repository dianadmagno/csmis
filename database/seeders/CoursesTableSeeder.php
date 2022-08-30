<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\References\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'name' => 'CSC',
            'description' => 'Candidate Soldier Course'
        ]);

        Course::create([
            'name' => 'INFOC',
            'description' => 'Infantry Orientation Course'
        ]);
    }
}
