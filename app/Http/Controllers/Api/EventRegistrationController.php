<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRegistrationRequest;
use App\Http\Resources\EventRegistrationResource;
use App\Models\EventDayShowTime;
use App\Models\EventRegistration;
use App\Models\MovieEventDay;
use Illuminate\Http\Request;

class EventRegistrationController extends Controller
{
    //
    public function store(EventRegistrationRequest $request)
    {
        $eventShowtime = EventDayShowTime::where('event_day_id', $request->eventday_id)
            ->where('show_time_id', $request->showtime_id)->select('id')->first();
        $movieEvent = MovieEventDay::where('movie_id', $request->movie_id)
            ->where('event_day_show_time_id', $eventShowtime->id)->select('id')->first();
        $event = EventRegistration::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'movie_event_day_id' => $movieEvent->id
        ]);
        return new EventRegistrationResource($event);
    }
}
