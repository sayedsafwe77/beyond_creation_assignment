<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class EventRegisterationController extends Controller
{
    //
    public function index()
    {
        $registrations = EventRegistration::filter()->paginate();
        return view('dashboard.registration.index', compact('registrations'));
    }
    public function show(EventRegistration $registration)
    {
        return view('dashboard.registration.show', compact('registration'));
    }
}
