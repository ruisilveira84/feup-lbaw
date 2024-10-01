<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create(Request $request) {
        $item = new Item();

        $item->auction_id = $request->input('auction_id');
        $item->item_name = $request->input('item_name');
        $item->shipping = $request->input('shipping');
        $item->description = $request->input('description');
        $item->kind = $request->input('kind');

        $item->save();
        return response()->json($item);
    }

}
