<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\References\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            '1st-pft',
            '2nd-pft',
            '3rd-pft',
            'pawft',
            'squad_run',
            'platoon_run',
            'company_run',
            'obstacle_course',
            'aptitude',
            'conduct'
        ];

        $descriptions = [
            '1st Physical Fitness Test',
            '2nd Physical Fitness Test',
            '3rd Physical Fitness Test',
            'Philippine Army Warrior Fitness Test',
            'Squad Run',
            'Platoon Run',
            'Company Run',
            'Obstacle Course',
            'Aptitude Test',
            'Conduct'
        ];

        foreach($names as $key => $name) {
            Activity::create([
                'name' => $name,
                'description' => $descriptions[$key]
            ]);
        }
    }
}
