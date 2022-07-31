<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    //
    public function show($id)
    {
        $address = Address::find($id);
        return view('address.index', [
            'address' => $address
        ]);
    }
}
