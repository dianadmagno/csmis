<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transactions\StudentClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $class = [
            '754-2022',
            '755-2022',
            '756-2022',
            '757-2022',
            '758-2022',
        ];

        $description = [
            'CSC Class 754-2022',
            'CSC Class 755-2022',
            'CSC Class 756-2022',
            'CSC Class 757-2022',
            'CSC Class 758-2022'
        ];

        $alias = [
            'Kabisig',
            'Madasig',
            'Silab',
            'None',
            'Na'
        ];

        foreach($class as $key => $name) {
            StudentClass::create([
                'name' => $name,
                'description' => $description[$key],
                'alias' => $alias[$key]
            ]);
        }
    }
}
