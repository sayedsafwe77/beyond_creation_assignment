<?php

namespace App\Models;

use App\Http\Filters\EventDayFilter;
use App\Http\Filters\Filterable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventDay extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $fillable = ['event_day'];
    protected $filter = EventDayFilter::class;

    public function showtimes()
    {
        return $this->belongsToMany(ShowTime::class, 'event_day_show_times');
    }
    public function showtime()
    {
        return $this->showtimes->first();
    }
    public function getEventDayStringFormatted()
    {
        return Carbon::parse($this->event_day)->toFormattedDayDateString();
    }
}
