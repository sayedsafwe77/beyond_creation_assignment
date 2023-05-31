<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventDayRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
        // return auth('sanctum')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'event_day' => 'required|date',
            'showtimes' => 'required|array|min:1',
        ];
    }
}
