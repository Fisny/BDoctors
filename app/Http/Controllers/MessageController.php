<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Message;
use App\Review;

class MessageController extends Controller
{
    //funzione che richiama tutti i messaggi dell'utente loggato dal più recente
    public function showMessages()
    {
        $loggedUser = Auth::user();
        $messages = Message::where('user_id', $loggedUser->id);
        return view('users.messages', compact('messages'), compact('loggedUser'));
    }

    // da spostare su controller a parte
    public function showReviews()
    {
        $loggedUser = Auth::user();
        $reviews = Review::where('user_id', $loggedUser->id);
        return view('users.reviews', compact('reviews'), compact('loggedUser'));
    }

    //funzione per consentire all'utente loggato di eliminare uno dei suoi messaggi
    public function destroy(Message $message)
    {
        $user = Auth::user();

        if ($user->id === $message->user_id) {
            $message->delete();
            return redirect()->route('users.messages');
        }
    }
}
