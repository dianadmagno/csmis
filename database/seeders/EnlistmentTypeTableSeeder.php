<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\References\EnlistmentType;
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
            EnlistmentType::create([
                'name' => $name,
                'description' => $description[$key]
            ]);
        }
    }
}
