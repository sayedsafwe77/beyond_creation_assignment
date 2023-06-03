<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MovieController extends Controller
{
    /**
     * @OA\Get(
     * path="/api/movies",
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
        $movies = Movie::filter()->simplePaginate();
        return MovieResource::collection($movies);
    }
}
