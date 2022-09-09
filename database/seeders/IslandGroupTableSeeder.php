<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\References\IslandGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IslandGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $islandGroup = [
            'Luzon',
            'Visayas',
            'Mindanao'
        ];

        $description = [
            'Luzon',
            'Visayas',
            'Mindanao'
        ];

        foreach($islandGroup as $key => $name) {
            IslandGroup::create([
                'name' => $name,
                'description' => $description[$key]
            ]);
        }
    }
}
