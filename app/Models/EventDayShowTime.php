<?php

namespace App\Models;

use App\Http\Filters\EventDayShowTimeFilter;
use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDayShowTime extends Model
{
    use HasFactory, Filterable;

    protected $filter = EventDayShowTimeFilter::class;
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
        return $this->belongsToMany(Movie::class, 'movie_eventdays', 'event_day_show_time_id', 'movie_id');
    }
}
