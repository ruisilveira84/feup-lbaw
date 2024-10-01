<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function create(Request $request) {
        $message = new Message();

        $message->sender_id = $request->input('sender_id');
        $message->receiver_id = $request->input('receiver_id');
        $message->sent_date = now();
        $message->contents = $request->input('contents');
        $message->seen = false;
        $message->save();

        return response()->json($message);
    }
}
