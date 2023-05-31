<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventDayRequest;
use App\Http\Requests\ShowTimeRequest;
use App\Models\EventDay;
use App\Models\ShowTime;
use Illuminate\Http\Request;

class EventDaysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $eventdays = EventDay::with('showtimes')->filter()->paginate();
        return view('dashboard.eventdays.index', compact('eventdays'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $showtimes_array = $this->getShowtimeArray();
        return view('dashboard.eventdays.create', compact('showtimes_array'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $eventday = EventDay::create(['event_day' => $request->event_day]);
        $eventday->showtimes()->attach($request->showtimes);
        flash(trans('eventdays.messages.created'));
        return redirect()->route('dashboard.eventdays.show', compact('eventday'));
    }

    /**
     * Display the specified resource.
     */
    public function show(EventDay $eventday)
    {
        return view('dashboard.eventdays.show', compact('eventday'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventDay $eventday)
    {
        //
        $showtimes_array = $this->getShowtimeArray();
        return view('dashboard.eventdays.edit', compact('eventday', 'showtimes_array'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventDayRequest $request, EventDay $eventday)
    {
        $eventday->update(['event_day' => $request->event_day]);
        $eventday->showtimes()->detach();
        $eventday->showtimes()->attach($request->showtimes);
        flash(trans('eventdays.messages.updated'));
        return redirect()->route('dashboard.eventdays.show', $eventday);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventDay $eventday)
    {
        //
        $eventday->delete();
        flash(trans('eventdays.messages.deleted'));
        return redirect()->route('dashboard.eventdays.index');
    }
    public function trashed()
    {
        $this->authorize('viewTrash', EventDay::class);
        $eventdays = EventDay::onlyTrashed()->paginate();
        return view('dashboard.eventdays.trashed', compact('eventdays'));
    }


    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\EventDay $showtime
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(EventDay $eventday)
    {
        $this->authorize('restore', $eventday);

        $eventday->restore();

        flash()->success(trans('eventdays.messages.restored'));

        return redirect()->route('dashboard.eventdays.trashed');
    }



    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\EventDay $product
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(EventDay $eventday)
    {
        $this->authorize('forceDelete', $eventday);
        $eventday->forceDelete();
        flash(trans('eventdays.messages.deleted'));
        return redirect()->route('dashboard.eventdays.trashed');
    }
    public function getShowtimeArray()
    {
        $showtimes = ShowTime::select('id', 'from', 'to')->get();
        $showtimes_array = [];
        $showtimes->each(function ($showtime) use (&$showtimes_array) {
            $showtimes_array[$showtime->id] = $showtime->text;
        });
        return $showtimes_array;
    }
}
