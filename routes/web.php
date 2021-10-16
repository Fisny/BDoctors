<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/dashboard_home', 'HomeController@index')->name('home');

//rotte di UserController
Route::resource('users', 'UserController');

//rotte del MessageController
Route::get('/messages/user', 'MessageController@showMessages')->name('messages')->middleware('auth');
// Da spostare su controller a parte
Route::get('/reviews/user', 'MessageController@showReviews')->name('reviews')->middleware('auth');
Route::delete('/messages/{message}/delete', 'MessageController@destroy')->name('messages.delete')->middleware('auth');

Route::get('/', 'WebAppController@home');
Route::get('/show/{user}', 'WebAppController@show')->name('profile.show');

Route::get('/search/{id}', function ($id) {

    return view('app/search', [
        "id" => $id,
    ]);
})->name('search');

// Route::get('/payment', function() {
//     return view('app.payment');
// });

// Route::get('/payment/process', 'PaymentsController@process')->name('payment.process');