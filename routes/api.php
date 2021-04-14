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

Route::get('/person','UserController@all');
Route::post('/person','UserController@store');
Route::delete('/person/{id}','UserController@delete');
Route::get('/person/{id}','UserController@show');
Route::put('/person/{id}','UserController@update');
