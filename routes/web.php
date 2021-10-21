<?php

use App\User;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/info', function () {
  return view('/app/info');
});

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

Route::get('/checkout/{id}', function ($id, Gateway $gateway) {
  return view('app/checkout', [
    "id" => $id,
    "token" => $gateway->clientToken()->generate(),
    "sponsorship" => Sponsorship::find($id)
  ]);
})->name('checkout');

// ROTTA PER PAGINA DI ACQUISTO SPONSORIZZAZIONI
Route::get('/sponsorship', function () {
  return view('/app/sponsorship');
})->name('sponsorship');

Route::get('/purchaseconfirmed', function () {
  return view('/app/purchaseconfirmed');
});

// ROTTA PER PAGINA PAGAMENTI
Route::post('/payment', function (Request $request, Gateway $gateway) {
  // dd($request->payment_method_nonce );
  $sponsorshipId = $request->id;
  $sponsorship = Sponsorship::find($sponsorshipId);
  //utente logato
  $user = User::find(Auth::id());
  //flag verifica sponsorizzazione attiva
  $sponsorshipActiv = $user->sponsorship->count() ;









  $amount = $sponsorship->price;
  $nonce = $request->payment_method_nonce;
  $sponsorshipName = $sponsorship->name;
  // dd($nonce );

  $result = $gateway->transaction()->sale([
    'amount' => $amount,
    'paymentMethodNonce' => $nonce,
    'options' => [
      'submitForSettlement' => true
    ]
  ]);

  // $transaction = $result->transaction;


  if ($result->success) {
    if ($sponsorshipActiv == 0) {
      $dateEnd = Carbon::now()->addHour($sponsorship->duration);
      $user->sponsorship()->attach($sponsorshipId, [
        'date_end' => $dateEnd,
      ]);
      dd("nessuna sponsorizzazione precedente" . $dateEnd);
    } else {
      //scadenza ultima sponsorizzazione
      $dateEndLastSponsorship = $user->sponsorship->last()->pivot->date_end;
      $lastDateEnd = Carbon::parse($dateEndLastSponsorship)->addHour($sponsorship->duration);
      $user->sponsorship()->attach($sponsorshipId, [
        'date_end' => $lastDateEnd,
      ]);
      dd("una o + sponsorizzazioni precedenti" . $lastDateEnd . " Dati trans. " );
    }
    return view('/app/purchaseconfirmed', ['sponsorship' => $sponsorship]);
  } else {
    $errorString = "";
    foreach ($result->errors->deepAll() as $error) {
      $errorString .= 'Errore' . $error->code . ':' . $error->message . '\n';
    }
    return back()->withErrors('An error occurred with the message: ' .  $result->message);
  }
});


Route::get('/storic', function () {

  //utente logato
  $user = User::find(Auth::id());
  $sponsorships = $user->sponsorship;
  // dd($sponsorship);
  // $Sponsorships = $user->sponsorship->last()->pivot->take(4)->get()->reverse();
  $indexLastSponsorship= (($user->sponsorship->count())-1);
  // dd($user->sponsorship);
  if($indexLastSponsorship>=5){
    $startIndex= $indexLastSponsorship -5;
  } else {
    $startIndex = 0;
  }
  // dd($startIndex);

  return view('app/storic', compact("user","indexLastSponsorship", "startIndex"));
})->name('storic');


// Route::post('/payment', "OrderController@makePayment");

// return view('purchaseConfirmed', compact('transaction', 'duration', 'amount'));
