<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventRegistrationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'movie' => new MovieResource($this->movieEventday->movie),
            'eventday' => new EventDayResource($this->movieEventday->eventDayShowTime->eventday),
            'showtime' => new ShowTimeResource($this->movieEventday->eventDayShowTime->showtime),
        ];
    }
}
