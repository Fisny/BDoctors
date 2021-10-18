<?php

use Carbon\Carbon;
use App\Sponsorship;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/checkout/{id}', function ($id,Gateway $gateway) {
    return view('app/checkout', [
        "id"=>$id,
        "token" => $gateway->clientToken()->generate(),
        "sponsorship" => Sponsorship::find($id)
    ]);
})->name('checkout');

Route::get('/sponsorship', function () {
  return view('/app/sponsorship');
});


Route::post('/payment', function (Request $request, Gateway $gateway) {
    // dd($request->payment_method_nonce );
    // $user = User::find(Auth::id());
    $sponsorship = Sponsorship::find($request->id);


    $amount = $sponsorship->price;
    $nonce = $request->payment_method_nonce;
    // dd($nonce );

    $result = $gateway->transaction()->sale([
      'amount' => $amount,
      'paymentMethodNonce' => $nonce,
      'options' => [
        'submitForSettlement' => true
      ]
      ]);

    //   /* attach user-sponsorship */
    //   $due_date = Carbon::now()->addHour($duration + 2);
    //   $user->sponsorships()->attach($sponsorship_id, ['due_date' => $due_date]);

      if($result->success){
        $transaction = $result->transaction;
        dd($transaction );
        // return view('admin.sponsorships.thankyou', compact('transaction', 'duration', 'amount'));
      } else {
        $errorString ="";
        foreach($result->errors->deepAll() as $error){
          $errorString .= 'Errore' . $error->code . ':' . $error->message . '\n';
        }
        dd($result->message );
        return back()->withErrors('An error occurred with the message: ' .  $result->message);
      }
  });
// Route::post('/payment', "OrderController@makePayment");