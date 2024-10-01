<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BidderSeller;
use App\Models\Address;
use App\Models\PaymentMethod;
use App\Models\Card;
use App\Models\Paypal;
class BidderSellerController extends Controller
{
    public function create(Request $request) {
        $bidderSeller = new BidderSeller();
        $address = new Address();
        $paymentMethod = new PaymentMethod();
        
        $address->street = $request->street;
        $address->city = $request->city;
        $address->zipcode = $request->zipcode;
        $address->country = $request->country;
        $address->save();

        $bidderSeller->bidder_seller_id = auth()->user()['user_id'];
        $bidderSeller->address_id = $address->getKey();
        $bidderSeller->rating = 0;
        $bidderSeller->save();

        $paymentMethod->bidder_seller_id = auth()->user()['user_id'];
        $paymentMethod->save();

        switch ($request->payment_method) {
            case "card":
                Card::create([
                    'card_id' => $paymentMethod->getKey(),
                    'number' => $request->cardnumber,
                    'holder_name' => $request->holdername,
                    'exp_date' => $request->expirationdate,
                    'cvv' => $request->cvv
                ]);
                break;
            case "paypal":
                Paypal::create([
                    'paypal_id' => $paymentMethod->getKey(),
                    'email' => $request->paypalemail
                ])->getKey();
                break;
        }
        
        return back();
    }
}
