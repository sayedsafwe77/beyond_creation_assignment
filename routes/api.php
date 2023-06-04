<?php

// use App\Http\Controllers\Api\ShowTimeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller('ShowTimeController')->group(function () {
    Route::get('showtimes', 'index');
    Route::post('showtimes', 'store');
    Route::delete('showtimes/{showtime}', 'destroy');
    Route::get('/select/showtimes', 'select')->name('showtimes.select');
});
Route::controller('MovieController')->group(function () {
    Route::get('movies', 'index');
});
Route::controller('EventDayController')->group(function () {
    Route::get('movie/eventdays', 'getMovieEventDays');
});
Route::controller('EventDayShowTimeController')->group(function () {
    Route::get('movie/eventday/showtimes', 'getMovieShowTimes');
});
Route::controller('EventRegistrationController')->group(function () {
    Route::post('register/event', 'store');
});
