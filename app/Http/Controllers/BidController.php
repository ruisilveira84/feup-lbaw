<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bid;
use App\Models\BidderSeller;
use App\Models\Auction;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BidController extends Controller
{
    public function bid(Request $request, $auction_id) {
        $bid = new Bid();
        $user = Auth::user();
        $auction = Auction::find($auction_id);
        if (!$auction || $auction->final_date < now()) {
            return back()->withErrors([
                'auction_over' => 'This auction is no longer active.'
            ]);
        }
        
        try {
            $bidder_seller_id = BidderSeller::findOrFail($user->user_id)->bidder_seller_id;
        } catch (ModelNotFoundException $e) {
            return back()->withErrors([
                'amount' => 'Please register a payment method before bidding.'
            ]);
        }

        if (Auction::where('auction_id', $auction_id)->first()->bidder_seller_id == $user->user_id) {
            return back()->withErrors([
                'ownauction' => 'Cannot bid on your own auction.'
            ]);
        }

        // Check if 'use_credit' is set and user has enough credit
        if ($request->filled('use_credit')) {
            $creditToUse = min($user->credit, $request->amount);

            // Check if the user has enough credit
            if ($creditToUse <= $user->credit) {
                // Deduct credit from user account
                $user->credit -= $creditToUse;
                $user->save();

                if ($creditToUse >= $request->amount) {
                    $request->merge(['amount' => 0]);
                } else {
                    $request->merge(['amount' => $request->amount - $creditToUse]);
                }
            } else {
                return back()->withErrors([
                    'use_credit' => 'Not enough credit to use for this bid.'
                ]);
            }
        }

        // Proceed with bid placement if any amount is left to bid
        if ($request->amount > 0) {
            $bid->bidder_seller_id = $bidder_seller_id;
            $bid->auction_id = $auction_id;
            $bid->bidding_date = now();
            $bid->amount = $request->amount;
            $bid->save();

            Auction::where('auction_id', $auction_id)->update(['current_bid' => $bid->amount]);
        }

        return back()->with('bid_success', 'Your bid was successful!');
    }
}
