<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SingleProductController extends Controller
{
    public function __invoke(Request $request, int $product_id )
    {
        return view('single-product', [
            'product' => Product::find($product_id),
        ]);
    }
}
