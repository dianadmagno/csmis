<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\References\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $region = [
            'NCR',
            'CAR',
            'Region I',
            'Region II',
            'Region III',
            'Region IV-A',
            'Region IV-B',
            'Region V',
            'Region VI',
            'Region VII',
            'Region VIII',
            'Region IX',
            'Region X',
            'Region XI',
            'Region XII',
            'Region XIII',
            'BARMM'
        ];

        $description = [
            'National Capital Region',
            'Cordillera Administrative Region',
            'Ilocos Region',
            'Cagayan Valley',
            'Central Luzon',
            'Calabarzon',
            'Mimaropa',
            'Bicol Region',
            'Western Visayas',
            'Central Visayas',
            'Eastern Visayas',
            'Zamboanga Peninsula',
            'Northern Mindanao',
            'Davao Region',
            'Soccsksargen',
            'Caraga',
            'Bangsamoro'
        ];

        foreach($region as $key => $name) {
            Region::create([
                'name' => $name,
                'description' => $description[$key]
            ]);
        }
    }
}
