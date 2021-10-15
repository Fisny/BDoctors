<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Message;

class MessageController extends Controller
{
    //funzione che richiama tutti i messaggi dell'utente loggato dal più recente
    public function showMessages()
    {
        $loggedUser = Auth::user();
        $messages = Message::where('user_id', $loggedUser->id);
        return view('users.messages', compact('messages'), compact('loggedUser'));
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
