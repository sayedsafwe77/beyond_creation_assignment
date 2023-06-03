<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Http\Filters\ShowTimeFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ShowTime extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $fillable = ['from', 'to'];
    protected $filter = ShowTimeFilter::class;
    protected function text(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $attributes['from'] . ' - ' . $attributes['to']
        );
    }
    protected function from(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => Carbon::parse($value)->format('H:i')
        );
    }
    protected function to(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => Carbon::parse($value)->format('H:i')
        );
    }
    public function events()
    {
        return $this->belongsToMany(EventDay::class, 'event_day_show_times', 'show_time_id', 'event_day_id');
    }
}
