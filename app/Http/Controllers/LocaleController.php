<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    /**
     * Change the dashboard language.
     *
     * @param string $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($locale)
    {
        Session::put('locale', $locale);
        App::setlocale($locale);

        return back();
    }
}
