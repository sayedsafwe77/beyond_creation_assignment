<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieEventDayResource;
use App\Models\MovieEventDay;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EventDayController extends Controller
{
    //

    /**
     * @OA\Get(
     * path="/api/movie/eventdays",
     * summary="show all movies",
     * description="show all movies api",
     *      @OA\Response(
     *          response=200,
     *          description="get all movies successfully",
     *          @OA\JsonContent()
     *       ),
     * )
     */
    public function getMovieEventDays(): AnonymousResourceCollection
    {
        // MovieEventDay::filter()->whereHas('eventDayShowTime',function($q){
        //     $q->where('is_active',true);
        // })->get()
        $movie_eventdays = MovieEventDay::filter()
            ->select('movie_eventdays.*', 'event_day_show_times.id', 'event_day_show_times.event_day_id')
            ->join('event_day_show_times', 'movie_eventdays.event_day_show_time_id', '=', 'event_day_show_times.id')
            ->get()->unique('event_day_id');
        return MovieEventDayResource::collection($movie_eventdays);
    }
}
