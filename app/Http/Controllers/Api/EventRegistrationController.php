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
    /**
     * @OA\Post(
     * path="/api/register/event",
     * summary="register for new event ",
     * description="register for new event api",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *            mediaType="application/json",
     *            @OA\Schema(
     *               type="object",
     *               required={"name","email","mobile","movie_id","eventday_id","showtime_id"},
     *               @OA\Property(property="name", type="string",example="sayed safwet"),
     *               @OA\Property(property="email", type="string",example="sayed@gmail.com"),
     *               @OA\Property(property="mobile", type="string",example="01100000000"),
     *               @OA\Property(property="movie_id", type="string",example="1"),
     *               @OA\Property(property="eventday_id", type="string",example="1"),
     *               @OA\Property(property="showtime_id", type="string",example="1"),
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=201,
     *          description="registaration done successfully",
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
