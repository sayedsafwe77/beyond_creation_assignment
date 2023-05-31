<?php

use Illuminate\Support\Facades\Route;

Route::view('/adminlte', 'dashboard.showtime.index');

Route::group(['middleware' => ['web', 'auth']], function () {
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
    Route::delete('delete', 'DeleteController@destroy')->name('delete.selected');
    Route::delete('forceDelete', 'DeleteController@forceDelete')->name('forceDelete.selected');
    Route::delete('restore', 'DeleteController@restore')->name('restore.selected');
});
