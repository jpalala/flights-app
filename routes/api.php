<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Here are the api routes to link the API for the flights
Route::prefix('flights')->group(function () {
    Route::get('/', 'FlightController@index')->name('flights');
    Route::post('/', 'FlightController@store')->name('flights.store');
    Route::get('/{id}', 'FlightController@show')->name('flights.show');
    Route::put('/{id}', 'FlightController@update')->name('flights.update');
    Route::delete('/{id}', 'FlightController@index')->name('flights.delete');
});