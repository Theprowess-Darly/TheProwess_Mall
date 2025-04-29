<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class VendorShopController extends Controller
{
    /**
     * Display the specified shop.
     * 
     * @param Shop $shop
     * @return \Illuminate\View\View
     */
    public function show(Shop $shop)

    {
        return view('vendor.shop.show', compact('shop'));
    }
}