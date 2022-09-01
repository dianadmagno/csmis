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
            'pft',
            'pawft',
            'squad_run',
            'platoon_run',
            'company_run',
            'obstacle_course'
        ];

        $descriptions = [
            'Physical Fitness Test',
            'Philippine Army Warrior Fitness Test',
            'Squad Run',
            'Platoon Run',
            'Company Run',
            'Obstacle Course'
        ];

        foreach($names as $key => $name) {
            Activity::create([
                'name' => $name,
                'description' => $descriptions[$key]
            ]);
        }
    }
}
