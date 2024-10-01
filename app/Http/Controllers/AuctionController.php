<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Item;
use App\Models\BidderSeller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;

class AuctionController extends Controller
{
    // Lists all active auctions
    // Get unique categories from active auctions
    public function getUniqueCategories()
    {
        $categories = Auction::where('status', 'active')
                        ->join('item', 'auction.auction_id', '=', 'item.auction_id')
                        ->distinct()
                        ->pluck('item.kind');
        return $categories;
    }

    public function status(string $status) {
        $auctions = Auction::where('status', $status)->get();
        return view('pages.status', ['auctions' => $auctions, 'status' => $status, 'title' => "DibsOnBids - " . $status . " Auctions"]);
    }

    // Your existing home method
    public function list() {
        $auctions = Auction::where('status', 'active')->get();
        $categories = $this->getUniqueCategories(); // Get unique categories

        return view('pages.home', ['auctions' => $auctions, 'categories' => $categories, 'title' => 'DibsOnBids - Home']);
    }

    // Shows a specific auction
    public function index($id) {
        $auction = Auction::findOrFail($id);

        $item = $auction->item;
        $seller = $auction->seller;
        return view('pages.auction', ['auction' => $auction, 'item' => $item, 'seller' => $seller, 'title' => "DibsOnBids - " . $item->item_name]);
    }

    // Creates a new auction
    public function create(Request $request) {
        $this->authorize('create', Auction::class);

        try {
            $bidder_seller_id = BidderSeller::findOrfail(auth()->user()->user_id)->bidder_seller_id;
        } catch (ModelNotFoundException $e) {
            return back()->withErrors([
                'submit' => 'Please register a payment method before creating an auction.'
            ]);
        }

        $auction = new Auction();
        $item = new Item();

        $auction->initial_bid = $request->initial_bid;
        $auction->current_bid = $request->initial_bid;
        $auction->bidder_seller_id = $bidder_seller_id;
        $auction->final_date = $request->final_date;
        $auction->initial_date = Carbon::now();

        $auction->save();

        $item->auction_id = $auction->getKey();
        $item->item_name = $request->item_name;
        $item->shipping = $request->shipping;
        $item->description = $request->description;
        $item->kind = $request->item_type;

        $item->save();

        return redirect()->action([AuctionController::class, 'index'], ['id' => $auction->auction_id]);
    }

    public function getAuctionsByCategory($category) {
        $auctions = Auction::whereHas('item', function ($query) use ($category) {
                        $query->where('kind', $category);
                    })->where('status', 'active')->get();
        
        return view('pages.category', ['auctions' => $auctions, 'category' => $category, 'status', 'title' => "DibsOnBids - " . ucfirst($category) . " Auctions"]);
    }
    
    
    public function search(Request $request) {
        $query = $request->query('query');

        $searchTerm = str_replace(' ', ':* & ', $query) . ':*';

        $auctions = Auction::whereHas('item', function ($queryBuilder) use ($searchTerm) {
            $queryBuilder->whereRaw('tsvectors @@ to_tsquery(\'english\', ?)', [$searchTerm])
                        ->orderByRaw('ts_rank(tsvectors, to_tsquery(\'english\', ?)) DESC', [$searchTerm]);
        })->where('status', 'active')->get();

        $categories = $this->getUniqueCategories(); 

        return view('pages.home', ['auctions' => $auctions, 'categories' => $categories, 'title' => "DibsOnBids - '" . $query . "'"]);
    }

}
