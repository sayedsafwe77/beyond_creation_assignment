<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Models\EventDay;
use App\Models\EventShowtime;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $movies = Movie::filter()->paginate();
        return view('dashboard.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $eventShowTimes_array = $this->getEventShowTimeArray();
        return view('dashboard.movies.create', compact('eventShowTimes_array'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->except('media', 'event_days_show_times', '_token'));
        $movie = Movie::create($request->except('media', 'event_days_show_times', '_token'));
        $movie->event_days_show_times()->attach($request->event_days_show_times);
        $movie->addAllMediaFromTokens();
        flash(trans('movies.messages.created'));
        return redirect()->route('dashboard.movies.show', $movie);
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return view('dashboard.movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
        $eventShowTimes_array = $this->getEventShowTimeArray();
        // dd($eventShowTimes_array);
        return view('dashboard.movies.edit', compact('movie', 'eventShowTimes_array'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovieRequest $request, Movie $movie)
    {
        $movie->update($request->except('media', 'event_days_show_times', '_token'));
        $movie->event_days_show_times()->detach();
        $movie->event_days_show_times()->attach($request->event_days_show_times);
        $movie->addAllMediaFromTokens();
        flash(trans('movies.messages.updated'));
        return redirect()->route('dashboard.movies.show', $movie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
        $movie->delete();
        flash(trans('movies.messages.deleted'));
        return redirect()->route('dashboard.movies.index');
    }
    public function trashed()
    {
        $this->authorize('viewTrash', Movie::class);
        $movies = Movie::onlyTrashed()->paginate();
        return view('dashboard.movies.trashed', compact('movies'));
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
    public function getEventShowTimeArray()
    {
        $eventShowTimes = EventShowtime::select('id', 'event_day_id', 'show_time_id')->get();
        $eventShowTimes_array = [];
        $eventShowTimes->each(function ($eventShowTime) use (&$eventShowTimes_array) {
            $eventShowTimes_array[$eventShowTime->id] = $eventShowTime->text;
        });
        return $eventShowTimes_array;
    }
}
