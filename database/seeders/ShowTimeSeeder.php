<?php

namespace Database\Seeders;

use App\Models\ShowTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShowTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $showtimes = [['from' => '18:00', 'to' => '20:30'], ['from' => '20:30', 'to' => '22:00'], ['from' => '22:00', 'to' => '01:00']];
        foreach ($showtimes as $showtime) {
            ShowTime::create([
                'from' => $showtime['from'],
                'to' => $showtime['to'],
            ]);
        }
    }
}
