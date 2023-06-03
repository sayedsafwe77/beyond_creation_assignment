<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class EventShowtime extends Model
{
    use HasFactory;
    protected $table = 'event_day_show_times';
    protected $with = ['eventday', 'showtime'];
    public function eventday()
    {
        return $this->belongsTo(EventDay::class, 'event_day_id');
    }
    public function showtime()
    {
        return $this->belongsTo(ShowTime::class, 'show_time_id');
    }
    protected function text(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $this->eventday->event_day . ' / ' . $this->showtime->from . ' - ' . $this->showtime->to
        );
    }
}
