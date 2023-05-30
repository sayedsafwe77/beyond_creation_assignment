<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowTimeRequest;
use App\Http\Resources\ShowTimeResource;
use App\Models\ShowTime;
use Illuminate\Http\JsonResponse;

class ShowTimeController extends Controller
{
    /**
     * @OA\Get(
     * path="/api/showtimes",
     * summary="show all showtimes",
     * description="show all showtimes api",
     *      @OA\Response(
     *          response=200,
     *          description="get all showtimes successfully",
     *          @OA\JsonContent()
     *       ),
     * )
     */
    public function index()
    {
        return ShowTimeResource::collection(ShowTime::get());
    }

    public function show()
    {
        return ShowTimeResource::collection(ShowTime::get());
    }
    public function indexWithTrashed()
    {
        return ShowTimeResource::collection(ShowTime::withTrashed()->get());
    }
    public function restore($request)
    {
        ShowTime::withTrashed()->whereIn('id', $request->id)->restore();
        return response()->json(['msg' => 'restore successfully']);
    }
    /**
     * @OA\Post(
     * path="/api/showtimes",
     * summary="create new showtime",
     * description="create new showtime",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *            mediaType="application/json",
     *            @OA\Schema(
     *               type="object",
     *               required={"from","to"},
     *               @OA\Property(property="from", type="time",example="8:00"),
     *               @OA\Property(property="to", type="time",example="10:00"),
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=201,
     *          description="showtime created successfully",
     *          @OA\JsonContent()
     *       ),
     *    @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\JsonContent()
     *       ),
     *
     * )
     * )
     */
    public function store(ShowTimeRequest $request): ShowTimeResource
    {
        return new ShowTimeResource(ShowTime::create($request->all()));
    }
    /**
     * @OA\Delete(
     * path="/api/showtimes/{id}",
     * summary="delete showtime ",
     * description="delete showtime with id",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="showtime id to be deleted",
     *         required=true,
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="showtime deleted successfully",
     *            @OA\Schema(
     *               type="object",
     *               @OA\Property(property="msg",example="showtime deleted successfully"),
     *            ),
     *       ),
     *    @OA\Response(
     *          response=404,
     *          description="Not Found Id",
     *       ),
     * )
     */
    public function destroy(ShowTime $showtime): JsonResponse
    {
        $showtime->delete();
        return response()->json(['msg' => 'deleted successfully']);
    }
}
