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
    public function getMovieShowTimes(EventDayShowTimeRequest $request): AnonymousResourceCollection
    {
        return EventDayShowTimeResource::collection(EventDayShowTime::filter()->get());
    }
}
