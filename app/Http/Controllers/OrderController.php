<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //
}
/**
 * Show the payment page for the order.
 * 
 * @param \App\Models\Order $order
 * @return \Illuminate\View\View
 */
public function showPayment(Order $order)
{
    // Make sure the order belongs to the authenticated user
    if ($order->user_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }
    
    return view('client.orders.payment', compact('order'));
}
