<?php

namespace App\Http\Controllers\Api\Orders;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use App\Sponsorship;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway){
        // dd($gateway->clientToken());
        $token = $gateway->clientToken()->generate();

        $data= [
            'success'=> true,
            'token'=>$token
        ];

        return response()->json($data,200);

        // return "generate";
        
    }
    public function makePayment(OrderRequest $request, Gateway $gateway){
        $sponsorship = Sponsorship::find($request->amount);
        $result = $gateway->transaction()->sale([
            "amount" =>  $sponsorship->price, //Recupero il prezzo della sponsorizzazione attraverso il model collegato al database
            "paymentMethodNonce" => $request->token //recupero il token che arriva dalla post
        ]);

        if($result->success){
            $data= [
                'success'=> true,
                'message'=> "Transazione eseguita di ".$sponsorship->price." con Successo!"
            ];
            return response()->json($data,200);
        }else{
            $data= [
                'success'=> false,
                'message'=> "Transazione fallita di ".$sponsorship->price ."!!"
            ];
            return response()->json($data,401);
        }

        // return "make payment";
    }
}

