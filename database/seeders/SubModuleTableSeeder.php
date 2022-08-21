<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\References\SubModule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subModule = [
            'Sub Module 1',
            'Sub Module 2',
            'Sub Module 3',
            'Sub Module 1',
            'Sub Module 2',
            'Sub Module 3',
            'Sub Module 4',
            'Sub Module 5',
            'Sub Module 6',
        ];

        $description = [
            'Values Transformation',
            'Attitude & Behavior Development',
            'Culture & Belief Transformation',
            'Infantry Orientation',
            'Military Map Reading',
            'Weapons & Marksmanship',
            'Infantry Battle Drills',
            'Army Survival',
            'Practical Training Exercise'
        ];

        $module = [
            1,
            1,
            1,
            2,
            2,
            2,
            2,
            2,
            2
        ];

        foreach($subModule as $key => $name) {
            SubModule::create([
                'name' => $name,
                'description' => $description[$key],
                'module_id' => $module[$key]
            ]);
        }
    }
}
