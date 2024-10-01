<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function create(Request $request) {
        $notification = new Notification();

        $notification->bidder_seller_id = $request->input('bidder_seller_id');
        $notification->contents = $request->input('contents');
        $notification->sent_date = now();
        $notification->seen = false;
        $notification->save();

        return response()->json($notification);
    }
}
