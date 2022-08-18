<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\References\PersonnelCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PersonnelCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
            'tac-o',
            'stm',
            'astm',
            'tm'
        ];

        $description = [
            'Tactical Officer',
            'Senior Training Model',
            'Assistant Senior Training Model',
            'Training Model'
        ];

        foreach($name as $key => $name) {
            PersonnelCategory::create([
                'name' => $name,
                'description' => $description[$key]
            ]);
        }
    }
}
