<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bid;
use App\Models\Auction;
use App\Models\BidderSeller;
use App\Models\PaymentMethod;
use App\Models\Card;
use App\Models\Paypal;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {
        $user = auth()->user();
        $totalBids = Bid::where('bidder_seller_id', $user['user_id'])->count();
        $auctionsWon = Auction::where('status', 'completed')->join('bid', 'auction.current_bid', 'bid.amount')->where('bid.bidder_seller_id', $user['id'])->count();
        $rating = BidderSeller::where('bidder_seller_id', $user['user_id'])->select('rating')->first()?->rating;
        if ($rating) $rating = number_format($rating, 2);
        $bids = Bid::where('bid.bidder_seller_id', $user['user_id'])->join('auction', 'auction.auction_id', 'bid.auction_id')->join('item', 'item.auction_id', 'auction.auction_id')->get();
        return view('pages.profile', ['user' => $user, 'totalBids' => $totalBids, 'auctionsWon' => $auctionsWon, 'rating' => $rating, 'bids' => $bids, 'title' => "DibsOnBids - " . $user->username . "'s Profile"]);
    }

    public function showAddCreditForm()
    {
        return view('pages.add-credit', ['title' => "DibsOnBids - Add Credit"]);
    }

    public function addCredit(Request $request)
    {
        $validatedData = $request->validate([
            'credit_amount' => 'required|numeric|min:0.01',
        ]);

        $user = Auth::user();
        $user->credit += $validatedData['credit_amount'];
        $user->save();

        // Redirect to the profile page with success message
        return redirect()->route('profile')->with('success', 'Credit added successfully.');
    }

    // Method to show the delete account confirmation page
    public function showDeleteAccount()
    {
        return view('pages.deleteaccount', ['hideHeader' => true, 'title' => "DibsOnBids - Delete Account"]);
    }


    // Method to handle the account deletion logic
    public function deleteAccount(Request $request)
    {
        $user = Auth::user();


        DB::transaction(function () use ($user) {
            $bidderSeller = $user->bidderSeller;
            $address = $bidderSeller?->address;
            $paymentMethod = $bidderSeller?->paymentMethod;
            $card = Card::find($paymentMethod?->payment_method_id);
            $paypal = Paypal::find($paymentMethod?->payment_method_id);
            if ($paypal) $paypal->delete();
            elseif ($card) $card->delete();
            if ($bidderSeller) {
                $paymentMethod->delete();
                $bidderSeller->delete();
                $address->delete();
            }
            $user->delete();
        });

        Auth::logout();

        return redirect('/')->with('success', 'Your account has been deleted.');
    }
}
