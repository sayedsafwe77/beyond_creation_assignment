<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/', 'ShowTimeController@index');
    Route::resource('/showtimes', 'ShowTimeController');
    Route::get('trashed/showtimes', 'ShowTimeController@trashed')->name('showtimes.trashed');
    Route::get('trashed/showtimes/{trashed_showtime}', 'ShowTimeController@show')->name('showtimes.trashed.show');
    Route::post('showtimes/{trashed_showtime}/restore', 'ShowTimeController@restore')->name('showtimes.restore');
    Route::delete('showtimes/{trashed_showtime}/forceDelete', 'ShowTimeController@forceDelete')->name('showtimes.forceDelete');
    Route::resource('/eventdays', 'EventDaysController');
    Route::get('trashed/eventdays', 'EventDaysController@trashed')->name('eventdays.trashed');
    Route::get('trashed/eventdays/{trashed_showtime}', 'EventDaysController@show')->name('eventdays.trashed.show');
    Route::post('eventdays/{trashed_showtime}/restore', 'EventDaysController@restore')->name('eventdays.restore');
    Route::delete('eventdays/{trashed_showtime}/forceDelete', 'EventDaysController@forceDelete')->name('eventdays.forceDelete');
    Route::resource('/movies', 'MovieController');
    Route::get('trashed/movies', 'MovieController@trashed')->name('movies.trashed');
    Route::get('trashed/movies/{trashed_showtime}', 'MovieController@show')->name('movies.trashed.show');
    Route::post('movies/{trashed_showtime}/restore', 'MovieController@restore')->name('movies.restore');
    Route::delete('movies/{trashed_showtime}/forceDelete', 'MovieController@forceDelete')->name('movies.forceDelete');
    Route::resource('/registrations', 'EventRegisterationController');
    Route::delete('delete', 'DeleteController@destroy')->name('delete.selected');
    Route::delete('forceDelete', 'DeleteController@forceDelete')->name('forceDelete.selected');
    Route::delete('restore', 'DeleteController@restore')->name('restore.selected');
});
