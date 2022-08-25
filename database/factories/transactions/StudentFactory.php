<?php

namespace Database\Factories\transactions;

use App\Models\Transactions\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lastname' => fake()->lastname,
            'firstname' => fake()->firstname,
            'middlename' => 'A',
            'email' => fake()->unique()->safeEmail,
            'serial_number' => NULL,
            'age' => rand(20, 35),
            'birthdate' =>  1991-11-01,
            'address' => 'Taguig City',
            'headgear' => 55,
            'bda' => '1',
            'goa_chest' => 22,
            'goa_waist' => 36,
            'shoe_size' => 9,
            'shoe_width' => 33,
            'civil_status' => 1,
            'sex' => 1,
            'mobile_number' => '09383773821',
            'educational_attainment' => 3,
            'course' => 'BS Information Technology',
            'physical_profile' => 1,
            'ethnic_group_id' => 1,
            'unit_id' => 22,
            'rank_id' => 1,
            'enlistment_type_id' => 2,
            'class_id' => 2,
            'blood_type_id' => 11,
            'religion_id' => 1,
            'company_id' => 6,
        ];
    }
}
