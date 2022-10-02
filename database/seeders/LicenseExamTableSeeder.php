<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\References\LicenseExam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LicenseExamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exam = [
            'LPT',
            'RCE',
            'CPA',
            'MD',
            'RN',
            'RPh'
        ];

        $description = [
            'Licensure Professional for Teacher',
            'Registered Civil Engineer',
            'Certified Public Accoutancy',
            'Medical Doctor',
            'Registered Nurse',
            'Registered Pharmacists'
        ];

        foreach($exam as $key => $name) {
            LicenseExam::create([
                'name' => $name,
                'description' => $description[$key]
            ]);
        }
    }
}
