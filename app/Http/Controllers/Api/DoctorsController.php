<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Database\Eloquent\Relations\MorphTo;
use App\User;


class DoctorsController extends Controller
{
    public function filter($id)
    {
        $filteredDoctors = User::whereHas('specialization', function ($e) use ($id) {
            $e->where('specialization_id', $id);
        })->paginate(8);
        return response()->json($filteredDoctors);
    }

    // public function filter($word)
    // {
    //     $filteredDoctors = User::whereHas('specialization', function ($e) use ($word) {
    //         $e->where('specialization_id', '%' . $word . '%');
    //     })->paginate(8);
    //     return response()->json($filteredDoctors);
    // }

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


    public function show($id)
    {
        $doctor = User::where('id', $id)->first();
        return response()->json($doctor);
    }
}
