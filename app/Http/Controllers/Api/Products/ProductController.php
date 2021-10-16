<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request, Gateway $gateway){
        // dd($gateway->clientToken());
        $token = $gateway->clientToken()->generate();

        $data= [
            'success'=> true,
            'token'=>$token
        ];

        return response()->json($data,200);

        // return "generate";
        
    }
}
