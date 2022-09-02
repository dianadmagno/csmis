<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\References\Event;
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
            'km-run'
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
            '3.2 Kilometer Run'
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
            3
        ];

        foreach($event as $key => $name) {
            Event::create([
                'name' => $name,
                'description' => $description[$key],
                'activity_id' => $activityId[$key]
            ]);
        }
    }
}
