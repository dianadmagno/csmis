<?php

namespace Database\Seeders;

use App\Models\StudentType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EnlistmentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enlistmentType = [
            'SE',
            'Regular'
        ];

        $description = [
            'Special Enlistment',
            'Regular Quota'
        ];

        foreach($enlistmentType as $key => $name) {
            StudentType::create([
                'name' => $name,
                'description' => $description[$key]
            ]);
        }
    }
}
