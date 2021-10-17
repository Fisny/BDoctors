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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/info', function () {
    return view('/app/info');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//rotte di UserController
Route::resource('users', 'UserController');

//rotte del MessageController
Route::get('/messages/user', 'MessageController@showMessages')->name('messages')->middleware('auth');
Route::delete('/messages/{message}/delete', 'MessageController@destroy')->middleware('auth');

Route::get('/app', 'WebAppController@home');

Route::get('/search/{id}', function ($id) {
    
    return view('app/search', [
        "id"=>$id,
    ]);
})->name('search');

Route::get('/checkout/{id}', function ($id) {
    return view('app/checkout', [
        "id"=>$id,
    ]);
})->name('checkout');