<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    function create (Request $request) {
        $comment = new Comment();

        $comment->bidder_seller_id = Auth::user()->id;
        $comment->auction_id = $request->input('auction_id');
        $comment->comment_date = now();
        $comment->contents = $request->input('contents');
        $comment->save();

        return response()->json($comment);
    }
}
