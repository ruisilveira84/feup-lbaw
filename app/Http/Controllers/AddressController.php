<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Address;

class AddressController extends Controller
{
    public function create(Request $request) {
        $address = new Address();

        $address->street = $request->street;
        $address->city = $request->city;
        $address->zipcode = $request->zipcode;
        $address->country = $request->country;
        $address->save();

        return $address;
    }
}
