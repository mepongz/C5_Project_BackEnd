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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'players', 'middleware' => 'cors'], function() {

    // GET LIST OF PLAYERS
    Route::get('/', 'App\Http\Controllers\playerController@index');
    
    // GET A PLAYER
    Route::get('/{id}', 'App\Http\Controllers\playerController@show');

    // POST NEW PLAYER
    Route::post('/', 'App\Http\Controllers\playerController@store');

    // PUT EXISTING PLAYER
    Route::put('/{id}', 'App\Http\Controllers\playerController@update');

    // REMOVE EXISTING PLAYER
    Route::delete('/{id}', 'App\Http\Controllers\playerController@destroy');
});