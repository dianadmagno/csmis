<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\References\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $module = [
            'Module 1',
            'Module 2'
        ];

        $description = [
            'Military Transformation',
            'Army Warfighting'
        ];

        foreach($module as $key => $name) {
            Module::create([
                'name' => $name,
                'description' => $description[$key]
            ]);
        }
    }
}
