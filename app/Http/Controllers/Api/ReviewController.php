<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Review;

class ReviewController extends Controller
{
    //api post per salvare nel db nuove recensioni
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "user_name" => "string|max:50",
            "vote" => "required",
            "text" => "string",
            "avatar" => "url",
            "user_id" => "required"
        ]);

        // //da verificare (fonte:stackoverflow) //
        if ($validator->fails()) {
            // return redirect()->back()
            //     ->withInput($request->all())
            //     ->withErrors($validator->errors());
            return response()->json(['errors' => $validator->errors()]);
        }

        $data = $request->all();

        $newReview = new Review();
        $newReview->fill($data);
        $newReview->save();

        return response()->json([
            'status' => 'success',
            'review' => $newReview
        ]);
    }
}
