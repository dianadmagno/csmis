<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\References\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            'A',
            'B',
            'C',
            'D',
            'E',
            'F',
            'G',
            'H',
            'I',
            'J',
            'K',
            'L',
            'M',
            'N',
            'O',
            'P',
            'Q',
            'R',
            'S',
            'T',
            'U',
            'V',
            'W',
            'X',
            'Y',
            'Z'
        ];

        $description = [
            'Alpha',
            'Bravo',
            'Charlie',
            'Delta',
            'Echo',
            'Foxtrot',
            'Golf',
            'Hotel',
            'India',
            'Juliet',
            'Kilo',
            'Lima',
            'Mike',
            'November',
            'Oscar',
            'Papa',
            'Quebec',
            'Romeo',
            'Sierra',
            'Tango',
            'Uniform',
            'Victor',
            'Whiskey',
            'Xray',
            'Yankee',
            'Zulu'
        ];

        foreach($companies as $key => $name) {
            Company::create([
                'name' => $name,
                'description' => $description[$key]
            ]);
        }
    }
}
