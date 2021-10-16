<?php

namespace App\Http\Controllers\Api\Orders;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;

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
        $result = $gateway->transaction()->sale([
            "amount" => "$request->amount", //se metto $request->amount recupero il valore inviato dalla post
            "paymentMethodNonce" => $request->token //recupero il token che arriva dalla post
        ]);

        if($result->success){
            $data= [
                'success'=> true,
                'message'=> "Transazione dell'importo di ".$request->amount." eseguita con Successo!"
            ];
            return response()->json($data,200);
        }else{
            $data= [
                'success'=> false,
                'message'=> "Transazione fallita!!"
            ];
            return response()->json($data,401);
        }

        // return "make payment";
    }
}

