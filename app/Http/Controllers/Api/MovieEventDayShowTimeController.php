<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieEventDayShowTimeResource;
use App\Models\MovieEventDayShowTime;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MovieEventDayShowTimeController extends Controller
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
        return MovieEventDayShowTimeResource::collection(MovieEventDayShowTime::get());
    }
}
