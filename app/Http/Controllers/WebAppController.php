<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Review;

class WebAppController extends Controller
{
    public function home()
    {
        return view('app.home');
    }

    public function show(User $user)
    {
        $avgVote = Review::where('user_id', $user->id)->avg('vote');
        if ($avgVote == null) {
            $avgVote = 0;
        }

        // $updateDiff= Carbon::createFromFormat('Y-m-d H:i:s', $user->updated_at)->locale('it_IT')->diffForHumans(Carbon::now());
        // dd($updateDiff);
        return view('app.show', compact('user'), compact('avgVote'));
    }
}
