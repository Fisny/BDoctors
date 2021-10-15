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

// Route::resource('doctors', 'Api\DoctorsController');

Route::namespace('Api')->group(function () {

    Route::get('sponsored', 'DoctorsController@getSponsoredDoctors');
    Route::get('alldoctors', 'DoctorsController@allDoctors');
    Route::get('doctors/{id}', 'DoctorsController@show');
    Route::get('doctors/filter/{id}/', 'DoctorsController@filter');
    Route::get('specializations', 'DataController@specializationsList');
    Route::get('sponsorship', 'DataController@sponsorshipsList');
    Route::post('message/send', 'MessageController@store');
    Route::post('review/post', 'ReviewController@store');
    Route::delete('message/{id}', 'MessageController@destroy');
});


Route::get('orders/generate', 'Api\Orders\OrderController@generate');
Route::get('orders/make/payment', 'Api\Orders\OrderController@makePayment');

