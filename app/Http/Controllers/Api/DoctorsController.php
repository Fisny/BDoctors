<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Database\Eloquent\Relations\MorphTo;
use App\User;


class DoctorsController extends Controller
{

    public function allDoctors()
    {
        $allDoctors = User::orderBy('lastname')->get();;
        return response()->json($allDoctors);
    }


    public function getSponsoredDoctors()
    {
        $sponsoredDoctors = User::has('sponsorship')->get();
        return response()->json($sponsoredDoctors);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
