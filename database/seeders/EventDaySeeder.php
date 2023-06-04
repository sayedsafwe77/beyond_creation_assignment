<?php

namespace Database\Seeders;

use App\Models\EventDay;
use App\Models\ShowTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $showtimes = ShowTime::select('id as show_time_id')->get()->toArray();
        for ($i = 0; $i < 5; $i++) {
            $eventday = EventDay::create([
                'event_day' => fake()->date()
            ]);
            $eventday->showtimes()->sync($showtimes);
        }
    }
}
