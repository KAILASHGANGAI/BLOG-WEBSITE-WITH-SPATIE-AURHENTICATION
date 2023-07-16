<?php

namespace App\Http\Controllers;

use App\Events\MyChatEvent;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        Message::create([
            'sender_id'=>Auth::id(),
            'recever_id'=>3,
            'messages'=>$request->message
        ]);
        event(new MyChatEvent($message));

        return response()->json(['status' => 'success']);
    }
    public function getMessage(){
        $messages = Message::where('sender_id', Auth::id())->get();
    }
}
