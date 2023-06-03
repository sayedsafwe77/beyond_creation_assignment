<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieEventDayShowTimeResource;
use App\Http\Resources\ShowTimeResource;
use App\Models\MovieEventDayShowTime;
use App\Models\ShowTime;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EventDayController extends Controller
{

    /**
     * @OA\Get(
     * path="/api/eventdays/{id}",
     * summary="show movie eventday ",
     * description="show all eventdays api",
     *      @OA\Response(
     *          response=200,
     *          description="get all movies successfully",
     *          @OA\JsonContent()
     *       ),
     * )
     */
    public function getMovieEventDays(): AnonymousResourceCollection
    {
        // movie_id
        return MovieEventDayShowTimeResource::collection(MovieEventDayShowTime::filter()->simplePaginate());
    }
    /**
     * @OA\Get(
     * path="/api/eventdays/{id}",
     * summary="show movie eventday ",
     * description="show all eventdays api",
     *      @OA\Response(
     *          response=200,
     *          description="get all movies successfully",
     *          @OA\JsonContent()
     *       ),
     * )
     */
    public function getEventDayShowtime(): AnonymousResourceCollection
    {
        // movie_id
        return ShowTimeResource::collection(ShowTime::filter()->simplePaginate());
    }
}
