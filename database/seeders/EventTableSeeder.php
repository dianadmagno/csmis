<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\References\ActivityEvent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = [
            'sit-ups',
            'pushups',
            'km-run',
            'sit-ups',
            'pushups',
            'km-run',
            'sit-ups',
            'pushups',
            'km-run',
            'rate-by-student',
            'rate-by-course-director',
            'rate-by-tactical-officer'
        ];

        $description = [
            'Sit ups',
            'Push ups',
            '3.2 Kilometer Run',
            'Sit ups',
            'Push ups',
            '3.2 Kilometer Run',
            'Sit ups',
            'Push ups',
            '3.2 Kilometer Run',
            'Rate By Student',
            'Rate By Course Director',
            'Rate By Tactical Officer'
        ];

        $activityId = [
            1,
            1,
            1,
            2,
            2,
            2,
            3,
            3,
            3,
            4,
            4,
            4
        ];

        foreach($event as $key => $name) {
            ActivityEvent::create([
                'name' => $name,
                'description' => $description[$key],
                'activity_id' => $activityId[$key]
            ]);
        }
    }
}
