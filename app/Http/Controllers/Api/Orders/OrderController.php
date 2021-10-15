<?php

namespace App\Http\Controllers\Api\Orders;
use Braintree\Gateway;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    public function makePayment(Request $request, Gateway $gateway){
        return "make payment";
    }
}
