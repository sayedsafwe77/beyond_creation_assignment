<?php

namespace Database\Seeders;

use App\Models\EventDayShowTime;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => env('TMDB_TOKEN')
        ])->get('http://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=en-US&page=1&sort_by=popularity.desc');
        // original_title -> name
        // overview -> description
        // poster_path -> poster
        $movies = $response->json()['results'];
        foreach ($movies as $movie) {
            $event = EventDayShowTime::inRandomOrder()->select('id as event_day_show_time_id')->first()->toArray();
            $newmovie = Movie::create([
                'name:en' => $movie['original_title'],
                'description:en' => $movie['overview'],
            ]);
            $newmovie->event_days_show_times()->attach($event);
            $newmovie->addMediaFromUrl(env('TMDB_IMAGE_BASE_URL') . '/' . $movie['poster_path'])->toMediaCollection('movie_images');
        }
    }
}
