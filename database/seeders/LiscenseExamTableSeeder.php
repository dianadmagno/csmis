<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\References\LiscenseExam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LiscenseExamTableSeeder extends Seeder
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
            'Licensure Exam for Teacher',
            'Registered Civil Engineer',
            'Certified Public Accoutancy',
            'Medical Doctor',
            'Registered Nurse',
            'Registered Pharmacists'
        ];

        foreach($exam as $key => $name) {
            LiscenseExam::create([
                'name' => $name,
                'description' => $description[$key]
            ]);
        }
    }
}
