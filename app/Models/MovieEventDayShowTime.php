<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Http\Filters\MovieEventDayShowTimeFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieEventDayShowTime extends Model
{
    use HasFactory, Filterable;
    protected $filter = MovieEventDayShowTimeFilter::class;
    protected $table = 'movie_eventday_showtime';

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
    public function eventDay()
    {
        return $this->belongsTo(EventDay::class, 'event_day_id');
    }
    public function showTime()
    {
        return $this->belongsTo(ShowTime::class, 'show_time_id');
    }
}
