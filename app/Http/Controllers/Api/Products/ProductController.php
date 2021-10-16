<?php

namespace App\Http\Controllers\Api\Products;

use App\Sponsorship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index(Request $request){
        $sponsorshipsList = Sponsorship::all();

        return ProductResource::collection($sponsorshipsList);
        // return response()->json($sponsorshipsList,200);
    }
}
