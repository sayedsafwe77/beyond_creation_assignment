<?php

namespace App\Models;

use App\Http\Filters\EventRegistrationFilter;
use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    use HasFactory, Filterable;
    protected $guarded = [];
    protected $filter = EventRegistrationFilter::class;

    public function movieEventday()
    {
        return $this->belongsTo(MovieEventDay::class, 'movie_event_day_id');
    }
}
