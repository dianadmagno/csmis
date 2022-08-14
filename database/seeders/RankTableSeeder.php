<?php

namespace Database\Seeders;

use App\Models\References\Rank;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rankName = [
            'CS',
            'Pvt',
            'PFC',
            'Cpl',
            'Sgt',
            'SSg',
            'TSg',
            'MSg',
            'SMS',
            'CMS',
            '2LT',
            '1LT',
            'CPT',
            'MAJ',
            'LTC',
            'COL',
            'BGEN',
            'MGEN',
            'LTGEN',
            'GEN'
        ];

        $description = [
            'Candidate Soldiers',
            'Private',
            'Private First Class',
            'Corporal',
            'Sergeant',
            'Staff Sergeant',
            'Technical Sergeant',
            'Master Sergeant',
            'Senior Master Sergeant',
            'Chief Master Sergeant',
            'SECOND LIEUTENANT',
            'FIRST LIEUTENANT',
            'CAPTAIN',
            'MAJOR',
            'LIEUTENANT COLONEL',
            'COLONEL',
            'BRIGADIER GENERAL',
            'MAJOR GENERAL',
            'LIEUTENANT GENERAL',
            'GENERAL'
        ];

        foreach($rankName as $key => $name) {
            Rank::create([
                'name' => $name,
                'description' => $description[$key]
            ]);
        }
    }
}
