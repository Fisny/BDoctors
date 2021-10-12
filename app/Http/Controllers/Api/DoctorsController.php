<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Database\Eloquent\Relations\MorphTo;
use App\User;


class DoctorsController extends Controller
{
    //api get restituisce la lista di medici con la specializzazione selezionata(tramite id)
    public function filter($id)
    {
        //medici senza sponsorizzazioni attive
        $filteredDoctors2 = User::whereHas('specialization', function ($e) use ($id) {
            $e->where('specialization_id', $id);
        })->whereDoesntHave('sponsorship'); //nota bene: se metti il get() non funge

        //medici con sponsorizzazioni attive +(union) medici senza
        $filteredDoctors1 = User::whereHas('specialization', function ($e) use ($id) {
            $e->where('specialization_id', $id);
        })->has('sponsorship')->union($filteredDoctors2)->Paginate(6);

        return response()->json($filteredDoctors1);
    }


    // public function filter($word)
    // {
    //     $filteredDoctors = User::whereHas('specialization', function ($e) use ($word) {
    //         $e->where('specialization_id', '%' . $word . '%');
    //     })->paginate(8);
    //     return response()->json($filteredDoctors);
    // }


    //api get restituisce la lista completa di medici, in ordine alfabetico
    public function allDoctors()
    {
        $allDoctors = User::orderBy('lastname')->get();;
        return response()->json($allDoctors);
    }

    //api get restituisce la lista dei medici con sponsorizzazioni attive
    public function getSponsoredDoctors()
    {
        $sponsoredDoctors = User::has('sponsorship')->get();
        return response()->json($sponsoredDoctors);
    }


    public function show($id)
    {
        $doctor = User::where('id', $id)->first();
        return response()->json($doctor);
    }
}
