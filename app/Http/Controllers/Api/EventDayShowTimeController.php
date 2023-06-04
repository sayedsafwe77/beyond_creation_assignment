<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventDayShowTimeRequest;
use App\Http\Resources\EventDayShowTimeResource;
use App\Http\Resources\MovieEventDayResource;
use App\Models\EventDayShowTime;
use App\Models\MovieEventDay;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EventDayShowTimeController extends Controller
{

    /**
     * @OA\Get(
     * path="/api/movie/eventday/showtimes",
     * summary="show all movie showtimes",
     * description="show all movies showtimes api",
     *      @OA\Parameter(
     *         name="movie_id",
     *         in="path",
     *         description="id for movie that you want to display showtimes for",
     *         required=true,
     *      ),
     *      @OA\Parameter(
     *         name="event_day_id",
     *         in="path",
     *         description="id for eventday that you want to display showtimes for",
     *         required=true,
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="get all movies successfully",
     *          @OA\JsonContent()
     *       ),
     * )
     */
    public function getMovieShowTimes(EventDayShowTimeRequest $request): AnonymousResourceCollection
    {
        return EventDayShowTimeResource::collection(EventDayShowTime::filter()->get());
    }
}
