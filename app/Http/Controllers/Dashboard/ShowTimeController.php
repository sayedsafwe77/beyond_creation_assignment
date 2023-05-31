<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowTimeRequest;
use App\Models\ShowTime;
use Illuminate\Http\Request;

class ShowTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $showtimes = ShowTime::filter()->paginate();
        return view('dashboard.showtimes.index', compact('showtimes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.showtimes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShowTimeRequest $request)
    {
        $showtime = ShowTime::create($request->all());
        flash(trans('showtimes.messages.created'));
        return redirect()->route('dashboard.showtimes.show', compact('showtime'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowTime $showtime)
    {
        return view('dashboard.showtimes.show', compact('showtime'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShowTime $showtime)
    {
        //
        return view('dashboard.showtimes.edit', compact('showtime'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShowTimeRequest $request, ShowTime $showtime)
    {
        //
        $showtime->update($request->all());
        flash(trans('showtimes.messages.updated'));
        return redirect()->route('dashboard.showtimes.show', $showtime);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShowTime $showtime)
    {
        //
        $showtime->delete();
        flash(trans('showtimes.messages.deleted'));
        return redirect()->route('dashboard.showtimes.index');
    }
    public function trashed()
    {
        $this->authorize('viewTrash', ShowTime::class);
        $showtimes = ShowTime::onlyTrashed()->paginate();
        return view('dashboard.showtimes.trashed', compact('showtimes'));
    }


    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\ShowTime $showtime
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(ShowTime $showtime)
    {
        $this->authorize('restore', $showtime);

        $showtime->restore();

        flash()->success(trans('showtimes.messages.restored'));

        return redirect()->route('dashboard.showtimes.trashed');
    }



    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\ShowTime $product
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(ShowTime $showtime)
    {
        $this->authorize('forceDelete', $showtime);
        $showtime->forceDelete();
        flash(trans('showtimes.messages.deleted'));
        return redirect()->route('dashboard.showtimes.trashed');
    }
}
