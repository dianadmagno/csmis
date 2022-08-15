<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EthnicGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enlistmentType = [
            'Tagalog',
            'Ilokano',
            'Kapampangan',
            'Bikolano',
            'Aeta',
            'Igorot',
            'Ivatan',
            'Mangyan',
            'Cebuano',
            'Waray',
            'Ilonggo',
            'Ati',
            'Suludnon',
            'Badjao',
            'Yakan',
            'Blaan',
            'Maranao',
            'Tboli',
            'Tausug',
            'Bagobo'
        ];

        $description = [
            'Tagalog',
            'Ilokano',
            'Kapampangan',
            'Bikolano',
            'Aeta',
            'Igorot',
            'Ivatan',
            'Mangyan',
            'Cebuano',
            'Waray',
            'Ilonggo',
            'Ati',
            'Suludnon',
            'Badjao',
            'Yakan',
            'Blaan',
            'Maranao',
            'Tboli',
            'Tausug',
            'Bagobo'
        ];

        foreach($ethnicGroup as $key => $name) {
            EthnicGroup::create([
                'name' => $name,
                'description' => $description[$key]
            ]);
        }
    }
}
