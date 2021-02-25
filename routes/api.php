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
// Here are the api routes to link the API for your use 
Route::get('flights', 'FlightController@index');
Route::get('flights/{id}', 'FlightController@show');
Route::put('flights/{id}', 'FlightController@update');
Route::post('flights', 'FlightController@store');

