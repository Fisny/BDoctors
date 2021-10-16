<?php

namespace App\Http\Controllers\Api\Products;

use App\Sponsorship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(Request $request){
        $sponsorshipsList = Sponsorship::all();
        return response()->json($sponsorshipsList,200);
    }
}
