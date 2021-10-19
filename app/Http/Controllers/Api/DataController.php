<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Specialization;
use App\Sponsorship;
use App\Review;

class DataController extends Controller
{
    //api get per richiamare la lista di specializzazioni disponibili nel db
    public function specializationsList()
    {
        $specializationsList = Specialization::all();
        return response()->json($specializationsList);
    }

    //api get per richiamare la lista di pacchetti di sponsorizzazioni disponibili nel db
    public function sponsorshipsList()
    {
        $sponsorshipsList = Sponsorship::all();
        return response()->json($sponsorshipsList,200);
    }

    //api get per richiamare la lista di recensioni disponibili nel db
    public function reviewsList()
    {
        $reviewsList = Review::all();
        return response()->json($reviewsList);
    }
}
