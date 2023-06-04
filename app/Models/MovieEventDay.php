<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Http\Filters\MovieEventDayFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieEventDay extends Model
{
    use HasFactory, Filterable;
    protected $filter = MovieEventDayFilter::class;
    protected $table = 'movie_eventdays';

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
    public function eventDayShowTime()
    {
        return $this->belongsTo(EventDayShowTime::class, 'event_day_show_time_id');
    }
    public function showtimes()
    {
        return $this->hasManyThrough(ShowTime::class, EventDayShowTime::class, 'id', 'id', 'event_day_show_time_id', 'show_time_id');
    }
    // public function showTime()
    // {
    //     return $this->belongsTo(ShowTime::class, 'show_time_id');
    // }
}
