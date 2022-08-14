<?php

namespace Database\Seeders;

use App\Models\BloodType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BloodTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bloodType = [
            'A',
            'A+',
            'A-',
            'B',
            'B+',
            'B-',
            'AB',
            'AB+',
            'AB-',
            'O',
            'O+',
            'O-'
        ];

        $description = [
            'A',
            'A+',
            'A-',
            'B',
            'B+',
            'B-',
            'AB',
            'AB+',
            'AB-',
            'O',
            'O+',
            'O-'
        ];

        foreach($bloodType as $key => $name) {
            BloodType::create([
                'name' => $name,
                'description' => $description[$key]
            ]);
        }
    }
}
