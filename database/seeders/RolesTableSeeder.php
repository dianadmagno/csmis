<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleName = [
            'Administrator',
            'Tactical Officer',
            'Instructor',
            'Training Model',
            'Registrar'
        ];

        $description = [
            'Can add/updates users account and users role.',
            'Can view all students information and grades and personnel information.',
            'Can view students information and can add/update grades of students.',
            'Can update students information and view grades/standing of specific class.',
            'Can add/update students and personnel information.'
        ];

        foreach($roleName as $key => $name) {
            Role::create([
                'name' => $name,
                'description' => $description[$key]
            ]);
        }
    }
}
