<?php

namespace Database\Seeders;

use App\Models\References\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit = [
            'IMCOM',
            'ASCOM',
            'TRADOC',
            'ARESCOM',
            '1ID',
            '2ID',
            '3ID',
            '4ID',
            '5ID',
            '6ID',
            '7ID',
            '8ID',
            '9ID',
            '10ID',
            '11ID',
            'Armor Div',
            'BCT',
            'AAR',
            'FSRR',
            'SFR',
            'LRR',
            'ASR',
            'AIR',
            'CMOR',
            'HSG',
            'Finance Center',
            'APMC',
            'Accounting Service',
            'APAO'
        ];

        $description = [
            'IMCOM',
            'ASCOM',
            'TRADOC',
            'ARESCOM',
            '1ID',
            '2ID',
            '3ID',
            '4ID',
            '5ID',
            '6ID',
            '7ID',
            '8ID',
            '9ID',
            '10ID',
            '11ID',
            'Armor Div',
            'BCT',
            'AAR',
            'FSRR',
            'SFR',
            'LRR',
            'ASR',
            'AIR',
            'CMOR',
            'HSG',
            'Finance Center',
            'APMC',
            'Accounting Service',
            'APAO'
        ];

        foreach($unit as $key => $name) {
            Unit::create([
                'name' => $name,
                'description' => $description[$key]
            ]);
        }
    }
}
