<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\References\CollegeCourse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CollegeCourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = [
            'AB History',
            'AB Philosophy',
            'BFA Painting',
            'BFA Sculpture',
            'BFA Visual Communication',
            'AB Economics',
            'BS Economics',
            'AB Psychology',
            'BS Psychology',
            'BS Criminology',
            'AB Political Science',
            'AB English',
            'AB Linguistics',
            'AB Literature',
            'AB Anthropology',
            'AB Sociology',
            'AB Filipino',
            'BSFS',
            'AB Islamic Studies',
            'BSES',
            'BS Forestry',
            'BSFi',
            'BS Geology',
            'BS Biology',
            'BS Molecular Biology',
            'BS Physics',
            'BS Applied Physics',
            'BS Chemistry',
            'BS Computer Science',
            'BS Information Technology',
            'BS Information System',
            'BS Mathematics',
            'BS Applied Math',
            'BS Stat',
            'BS Agriculture',
            'BS Agribusiness',
            'BS Agroforestry',
            'BS Architecture',
            'BLA',
            'BS Interior Design',
            'BSA',
            'BSAcT',
            'BSBA',
            'BSBA Major in Economics',
            'BSBA Major in FM',
            'BSBA Major in HRDM',
            'BSBA Major in MM',
            'BSBA Major in OM',
            'BS HRM',
            'BS Entrep',
            'BSOA',
            'BS REM',
            'BSTM',
            'BS Med Tech',
            'BS Midwifery',
            'BSN',
            'BSOT',
            'BS Pharmacy',
            'BSPT',
            'BS Rad Tech',
            'BSRT',
            'BSED',
            'BEED',
            'BSED Major in TLE',
            'BSED Major in BS',
            'BSED Major in English',
            'BSED Major in Filipino',
            'BSED Major in Mathematics',
            'BSED Major in Islamic Studies',
            'BSED Major in MAPEH',
            'BSED Major in Physical Science',
            'BSED Major in Social Studies',
            'BSED Major in Values Education',
            'BEED Major in Preschool Education',
            'BEED Major in Special Education',
            'BLIS',
            'BPE',
            'BS AeroE',
            'BSCerE',
            'BSChE',
            'BSCE',
            'BSCpE',
            'BSECE',
            'BSGE',
            'BSGeoE',
            'BSIE',
            'BSMarE',
            'BSMatE',
            'BSME',
            'BSMeTE',
            'BSEM',
            'BSPetE',
            'BSSE',
            'AB Broadcasting',
            'AB Communication',
            'BS DevComm',
            'AB Journalism',
            'AB Mass Comm',
            'BS Community Development',
            'BSCA',
            'BS Foreign Service',
            'BPA',
            'BSPS',
            'BS Social Work',
            'BSMT',
            'BS Food Tech',
            'BS Nutrition and Dietetics',
            'BS Electronics Engineering'
        ];

        $description = [
            'Bachelor of Arts in History',
            'Bachelor of Arts in Philosophy',
            'Bachelor of Fine Arts in Painting',
            'Bachelor of Fine Arts in Sculpture',
            'Bachelor of Fine Arts in Visual Communication',
            'Bachelor of Arts in Economics',
            'Bachelor of Science in Economics',
            'Bachelor of Arts in Psychology',
            'Bachelor of Arts in Psychology',
            'Bachelor of Science in Criminology',
            'Bachelor of Arts in Political Science',
            'Bachelor of Arts in English',
            'Bachelor of Arts in Linguistics',
            'Bachelor of Arts in Literature',
            'Bachelor of Arts in Anthropology',
            'Bachelor of Arts in Sociology',
            'Bachelor of Arts in Filipino',
            'Bachelor of Science in Forensic Science',
            'Bachelor of Arts in Islamic Studies',
            'Bachelor of Science in Environmental Science',
            'Bachelor of Science in Forestry',
            'Bachelor of Science in Fisheries',
            'Bachelor of Science in Geology',
            'Bachelor of Science in Biology',
            'Bachelor of Science in Molecular Biology',
            'Bachelor of Science in Physics',
            'Bachelor of Science in Applied Physics',
            'Bachelor of Science in Chemistry',
            'Bachelor of Science in Computer Science',
            'Bachelor of Science in Information Technology',
            'Bachelor of Science in Information System',
            'Bachelor of Science in Mathematics',
            'Bachelor of Science in Applied Math',
            'Bachelor of Science in Stat',
            'Bachelor of Science in Agriculture',
            'Bachelor of Science in Agribusiness',
            'Bachelor of Science in Agroforestry',
            'Bachelor of Science in Architecture',
            'Bachelor of Landscape Architecture',
            'Bachelor of Science in Interior Design',
            'Bachelor of Science in Accountancy',
            'Bachelor of Science in Accounting Technology',
            'Bachelor of Science in Business and Accountancy',
            'Bachelor of Science in Business and Accountancy Major in Economics',
            'Bachelor of Science in Business and Accountancy Major in Financial Management',
            'Bachelor of Science in Business and Accountancy Major in Human Resource Development',
            'Bachelor of Science in Business and Accountancy Major in Marketing Management',
            'Bachelor of Science in Business and Accountancy Major in Operation Management',
            'Bachelor of Science in Hotel and Restaurant Management',
            'Bachelor of Science in Entreprenuer',
            'Bachelor of Science in Office Administration',
            'Bachelor of Science in Real State Management',
            'Bachelor of Science in Tourism Management',
            'Bachelor of Science in Medical Technology',
            'Bachelor of Science in Midwifery',
            'Bachelor of Science in Nursing',
            'Bachelor of Science in Occupational Technology',
            'Bachelor of Science in Pharmacy',
            'Bachelor of Science in Physical Therapist',
            'Bachelor of Science in Radiologic Technology',
            'Bachelor of Science in Respiratory Theraphy',
            'Bachelor of Secondary Education',
            'Bachelor of Elementary Education',
            'Bachelor of Secondary Education Major in Technological and Livelihood Education',
            'Bachelor of Secondary Education Major in Biological Science',
            'Bachelor of Secondary Education Major in English',
            'Bachelor of Secondary Education Major in Filipino',
            'Bachelor of Secondary Education Major in Mathematics',
            'Bachelor of Secondary Education Major in Islamic Studies',
            'Bachelor of Secondary Education Major in MAPEH',
            'Bachelor of Secondary Education Major in Physical Science',
            'Bachelor of Secondary Education Major in Social Studies',
            'Bachelor of Secondary Education Major in Values Education',
            'Bachelor of Elementary Education Major in Preschool Education',
            'Bachelor of Elementary Education Major in Special Education',
            'Bachelor of Library and Information Science in the Philippines',
            'Bachelor of Physical Education',
            'Bachelor of Science in Aeronautical Engineering',
            'Bachelor of Science in Ceramic Engineering',
            'Bachelor of Science in Chemical Engineering',
            'Bachelor of Science in Civil Engineering',
            'Bachelor of Science in Computer Engineering',
            'Bachelor of Science in Electrical Engineering',
            'Bachelor of Science in Geodetic Engineering',
            'Bachelor of Science in Geological Engineering',
            'Bachelor of Science in Industrial Engineering',
            'Bachelor of Science in Marine Engineering',
            'Bachelor of Science in Materials Engineering',
            'Bachelor of Science in Mechanical Engineering',
            'Bachelor of Science in Metallurgical Engineering',
            'Bachelor of Science in Mining Engineering',
            'Bachelor of Science in Petroleum Engineering',
            'Bachelor of Science in Sanitary Engineering',
            'Bachelor of Arts in Broadcasting',
            'Bachelor of Arts in Communication',
            'Bachelor of Science in Development Communication',
            'Bachelor of Arts in Journalism',
            'Bachelor of Arts in Mass Communication',
            'Bachelor of Science in Community Development',
            'Bachelor of Science in Customs Administration',
            'Bachelor of Science in Foreign Service',
            'Bachelor of Public Administration',
            'Bachelor of Science in Public Safety',
            'Bachelor of Science in Social Work',
            'Bachelor of Science in Marine Transportation',
            'Bachelor of Science in Food Tech',
            'Bachelor of Science in Nutrition and Dietetics',
            'Bachelor of Science in Electronics Engineering',
        ];

        foreach($course as $key => $name) {
            CollegeCourse::create([
                'name' => $name,
                'description' => $description[$key]
            ]);
        }
    }
}
