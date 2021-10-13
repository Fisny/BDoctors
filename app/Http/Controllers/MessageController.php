<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Message;

class MessageController extends Controller
{
    //funzione che richiama tutti i messaggi dell'utente loggato dal più recente
    public function showMessages()
    {
        $user = Auth::user();
        $messages = Message::where('user_id', $user->id)->reverse();
        return view('messages', compact('messages'));
    }

    //funzione per consentire all'utente loggato di eliminare uno dei suoi messaggi
    public function destroy(Message $message)
    {
        $user = Auth::user();

        if ($user->id === $message->user_id) {
            $message->delete();
            return redirect()->route('messages');
        }
    }
}
