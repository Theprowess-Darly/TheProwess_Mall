<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(){
        return view('store', [
            'products' => Product::query()->where('status','approved')->paginate(20),
        ]);
    }
}
