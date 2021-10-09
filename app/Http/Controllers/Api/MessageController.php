<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Message;


class MessageController extends Controller
{
    //api post per salvare nel db nuovi messaggi
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:50",
            "lastname" => "required|string|max:50",
            "email" => "required|email",
            "text" => "required|string",
            "avatar" => "url",
            "user_id" => "required"
        ]);

        // //da verificare (fonte:stackoverflow)
        if ($validator->fails()) {
            // return redirect()->back()
            //     ->withInput($request->all())
            //     ->withErrors($validator->errors());
            return response()->json(['errors' => $validator->errors()]);
        }

        $data = $request->all();

        $newMessage = new Message();
        $newMessage->fill($data);
        $newMessage->save();

        return response()->json([
            'status' => 'success',
            'message' => $newMessage
        ]);
    }
}
