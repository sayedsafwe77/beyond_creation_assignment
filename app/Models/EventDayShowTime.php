<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDayShowTime extends Model
{
    use HasFactory;
    public function eventday()
    {
        return $this->belongsTo(EventDay::class, 'event_day_id');
    }
    public function showtime()
    {
        return $this->belongsTo(ShowTime::class, 'show_time_id');
    }
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_event_days', 'event_day_show_times_id', 'movie_id');
    }
}
