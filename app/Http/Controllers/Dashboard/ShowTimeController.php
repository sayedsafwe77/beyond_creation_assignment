<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
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
        return view('dashboard.showtime.index', compact('showtimes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function trashed()
    {
        $this->authorize('viewTrash', ShowTime::class);
        $showtime = ShowTime::onlyTrashed()->paginate();
        return view('dashboard.showtime.trashed', compact('showtime'));
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
        flash(trans('products.messages.deleted'));
        return redirect()->route('dashboard.showtimes.trashed');
    }
}
