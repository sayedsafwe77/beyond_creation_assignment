<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieEventDayShowTimeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->eventDayShowtime->eventday->id,
            // 'movie_event_day_id' => $this->id,
            'event_day' => $this->eventDayShowtime->eventday->event_day,
            // 'showtimes' =>  $this->eventDayShowtime->showtime->from . ' - ' . $this->eventDayShowtime->showtime->to,
            // 'movie_name' => $this->movie->name,
        ];
    }
}
