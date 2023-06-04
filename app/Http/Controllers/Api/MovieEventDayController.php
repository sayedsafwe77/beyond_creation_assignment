<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieEventDayRequest;
use App\Http\Resources\MovieEventDayResource;
use App\Http\Resources\ShowTimeResource;
use App\Models\MovieEventDay;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MovieEventDayController extends Controller
{
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
    public function index(): AnonymousResourceCollection
    {
        return MovieEventDayResource::collection(MovieEventDay::get());
    }
    public function getMovieShowTimes(MovieEventDayRequest $request): AnonymousResourceCollection
    {
        $movie_event_day = MovieEventDay::find($request->movie_event_day_id);
        return ShowTimeResource::collection($movie_event_day->showtimes);
    }
}
