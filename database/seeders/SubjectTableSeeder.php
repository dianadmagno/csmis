<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\References\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subject = [
            // Part I - Module I
            'Subject 1',
            'Subject 2',
            'Subject 3',
            'Subject 4',

            // Part II - Module I
            'Subject 1',
            'Subject 2',
            'Subject 3',
            'Subject 4',
            'Subject 5',
            'Subject 6',

            // Part III - Module I
            'Subject 1',
            'Subject 2',
            'Subject 3',
            'Subject 4',
            'Subject 5',

            // Part IV - Module II
            'Subject 1',
            'Subject 2',
            'Subject 3',
            'Subject 4',
            'Subject 5',
            'Subject 6',
            'Subject 7',

            // Part V - Module II
            'Subject 1',
            'Subject 2',
            'Subject 3',

            // Part VI - Module II
            'Subject 1',
            'Subject 2',
            'Subject 3',
            'Subject 4',

            // Part VII - Module II
            'Subject 1',
            'Subject 2',
            'Subject 3',
            'Subject 4',
            'Subject 5',
            'Subject 6',
            'Subject 7',
            'Subject 8',
            'Subject 9',
            'Subject 10',
            'Subject 11',
            'Subject 12',
            'Subject 13',
            'Subject 14',

            // Part VIII - Module II
            'Subject 1',
            'Subject 2',
            'Subject 3',
            'Subject 4',

            // Part IX - Module II
            'Subject 1',
            'Subject 2',
            'Subject 3',
            'Subject 4'
        ];

        $description = [
            // Part I - Module I
            'Military Values',
            'AFP Core Values',
            'Code of Conduct of a Filipino Soldier',
            'Warrior Ethos',

            // Part II - Module I
            'Military Courtesy and Discipline',
            'AFP Code of Conduct',
            'PA Uniforms, Awards and Decorations',
            'Interior Guard Duty',
            'Military Justice System',
            'HR, IHL and RoL',

            // Part III - Module I
            'Philippine Army: History and Organization',
            'Military Customs and Tradition',
            'Miliatry Drills and Ceremonies',
            'GAD',
            'PA Etiquette and Protocols',

            // Part IV - Module II
            'Fundamentals of Infantry Operation',
            'Infantry Rifflemen',
            'Infantry Squad',
            'Intro to Intel',
            'Bayonet Fighting',
            'Basic Field Fortification',
            'Disaster Relief and Rescue Operation',

            // Part V - Module II
            'Map Reading',
            'Land Navigation',
            'Army Navigation Equipment & Night Fighting System',

            // Part VI - Module II
            'Infantry Squad Weapons',
            'Weapons Care and Maintenance',
            'Basic Marksmanship Skills Development',
            'Marksmanship Record Firing',

            // Part VII - Module II
            'Individual and Squad Combat SOPs',
            'Radio Signal Operations',
            'Combat Tracking',
            'Combat Movement Formation and Techniques',
            'Patrolling',
            'Patrol Base Operation',
            'Weapons Fire Techniques',
            'OP Operations',
            'Raids and Ambuscades',
            'Link-Up Operations',
            'Military Check-point Operation',
            'Counter-EID operation',
            'Immediate Action Drills',
            'Battle Drill Exercise',

            // Part VIII - Module II
            'Basic Survival Skills Training',
            'Combative and Self-Defense Training',
            'First Aid',
            'Escape and Evasion',

            // Part IX - Module II
            'Military Stake',
            'Infiltration Course',
            'Individual Combat Profiency Circuit',
            'FTX'
        ];

        $subModule = [
            // Part I
            1,
            1,
            1,
            1,

            // Part II
            2,
            2,
            2,
            2,
            2,
            2,

            // Part III
            3,
            3,
            3,
            3,
            3,

            // Part IV
            4,
            4,
            4,
            4,
            4,
            4,
            4,

            // Part V
            5,
            5,
            5,

            // Part VI
            6,
            6,
            6,
            6,
            6,

            // Part VII
            7,
            7,
            7,
            7,
            7,
            7,
            7,
            7,
            7,
            7,
            7,
            7,
            7,
            7,

            // Part VIII
            8,
            8,
            8,
            8,

            // Part IX
            9,
            9,
            9,
            9
        ];

        $points = [
            // Part I
            10,
            10,
            10,
            15,

            // Part II
            15,
            10,
            10,
            15,
            15,
            15,

            // Part III
            10,
            15,
            30,
            10,
            10,

            // Part IV
            10,
            10,
            10,
            5,
            10,
            10,
            10,

            // Part V
            25,
            25,
            5,

            // Part VI
            20,
            10,
            5,
            20,
            20,

            // Part VII
            10,
            10,
            10,
            15,
            15,
            15,
            10,
            10,
            15,
            10,
            10,
            10,
            25,
            25,

            // Part VIII
            10,
            10,
            5,
            10,

            // Part IX
            20,
            20,
            20,
            20
        ];

        $pds = [
            // Part I
            2,
            2,
            2,
            4,

            // Part II
            2,
            2,
            2,
            8,
            2,
            4,

            // Part III
            2,
            4,
            110,
            2,
            2,

            // Part IV
            4,
            4,
            4,
            2,
            8,
            8,
            8,

            // Part V
            16,
            16,
            4,

            // Part VI
            24,
            8,
            4,
            152,
            0,

            // Part VII
            8,
            8,
            8,
            8,
            8,
            8,
            8,
            8,
            16,
            8,
            8,
            8,
            16,
            16,

            // Part VIII
            16,
            24,
            4,
            16,

            // Part IX
            20,
            20,
            20,
            42
        ];

        $items = [
            // Part I
            2,
            2,
            2,
            4,

            // Part II
            2,
            2,
            2,
            8,
            2,
            4,

            // Part III
            2,
            4,
            110,
            2,
            2,

            // Part IV
            4,
            4,
            4,
            2,
            8,
            8,
            8,

            // Part V
            16,
            16,
            4,

            // Part VI
            24,
            8,
            4,
            152,
            0,

            // Part VII
            8,
            8,
            8,
            8,
            8,
            8,
            8,
            8,
            16,
            8,
            8,
            8,
            16,
            16,

            // Part VIII
            16,
            24,
            4,
            16,

            // Part IX
            20,
            20,
            20,
            42
        ];

        foreach($subject as $key => $name) {
            Subject::create([
                'name' => $name,
                'description' => $description[$key],
                'sub_module_id' => $subModule[$key],
                'nr_of_points' => $points[$key],
                'nr_of_pds' => $pds[$key],
                'nr_of_items' => $items[$key]
            ]);
        }
    }
}
